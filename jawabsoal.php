<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/TimeCircles.css">
    <title>Document</title>
</head>
<body>
    <div id="bungkusSoal">

    </div>

    <input type="hidden" id="dataTampil">
    <input type="number" id="nilai" value="0">
    <button type="button" id="btnNext">Next</button>
    <button type="submit" id="btnFinish" style="display:none">Finish</button>


    <script src="./js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="./js/TimeCircles.js"></script>


    <script>
        $(document).ready(function() {
           $.ajax({
                url:'proses/tampilSoal.php?id=0',
                dataType: 'json',
                success:function(data) {
                    var jumlahSoal = data[0].length;
                    var text = '<input type="hidden" id="jumlahSoal" value="'+jumlahSoal+'">';
                    console.log(data);
                    $.each(data[0],function(key,val){
                        text += `
                            <div id="soal`+key+`" class="divSoal">
                                <h1>Soal :`+val.soal+`</h1>
                                <ul>`;
                                $.each(data[1][key],function(no,v) {
                                   text += `<li class="option" data-key="`+key+`" data-status="`+v.status_option+`">`+v.abjad+'. '+v.text_abjad+`</li>` 
                                });
                    text += `   </ul>
                            </div>
                            
                        <input type="hidden" id="jawab`+key+`" value="0">
                        `;
                        
                    });
                    $("#bungkusSoal").html(text);
                        $("#dataTampil").val('0');
                        $(".divSoal").hide();
                        $("#soal0").show();
                    

                    $("#btnNext").on('click',function() {
                        var soalTampil = parseInt($("#dataTampil").val());
                        $("#soal"+soalTampil).hide();
                        var soalNext = soalTampil + 1;
                        $("#soal"+soalNext).show();
                        $("#dataTampil").val(soalNext);

                        var jumlahSoal = parseInt($("#jumlahSoal").val());
                        if (soalNext == jumlahSoal -1) {
                            $("#btnNext").hide();
                            $("#btnFinish").show();
                        }
                        var isi = $("#jawab"+soalTampil).val(); 
                        var nilai = parseInt($("#nilai").val());
                        var angka = 0;
                        if (isi == 0) {
                            if (nilai != 0) {
                                    angka = angka + 0; 
                            }
                        }else{
                            angka = angka + 20;
                        }
                        var jumlah = nilai + angka;
                        $("#nilai").val(jumlah)
                    });

                    $(".option").on('click',function() {
                        $(".option").prop('style','color:#000;');
                        $(this).prop('style','color:red;');

                        var isi   = parseInt($(this).data('status')); 
                        $("#jawab"+$(this).data('key')).val(isi);

                    });
                },
                error:function(e) {
                  console.log(e);  
                }
           });
        });
    </script>
</body>
</html>