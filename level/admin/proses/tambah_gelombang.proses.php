<?php  
	require_once "../../../config/koneksi.php";

	if(isset($_POST['submit'])){
		$nama_gelombang = $_POST['input_gelombang'];
		if(!empty(is_numeric($nama_gelombang))){
            if($nama_gelombang > 0){
                $query_check = mysqli_query($connection, "SELECT * FROM tb_gelombang WHERE nama_gelombang = '$nama_gelombang'");
                if(mysqli_num_rows($query_check) == 0){
                    $query_insert = mysqli_query($connection, "INSERT INTO tb_gelombang VALUES (NULL, '$nama_gelombang', 'tidak aktif', 0)");
                    if($query_insert){
                        echo "	<script>
                                    alert('Gelombang sukses ditambahkan!');
                                    location.href = '../gelombang.php';
                                </script>";
                    }
                    else{
                        $pesan = "Gelombang gagal ditambahkan!";
                    }
                }
                else{
                    $pesan = "Gelombang sudah ada sebelumnya! Silahkan coba lagi!";
                }
            }
            else{
                $pesan = "Gelombang harus lebih dari 0!";
            }
			
		}
		else{
			$pesan = "Tolong isi semua form!";
		}

		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../tambah_gelombang.php';
			 	</script>";
	}	
	else{
		header('location: ../tambah_gelombang.php');
	}
?>