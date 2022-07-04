<?php  
	require_once "../../../config/koneksi.php";

	if(isset($_POST['submit'])){
		$kategori = $_POST['input_kategori'];
		$soal = $_POST['input_soal'];
        $jawaban1 = $_POST['input_jawaban1'];
        $jawaban2 = $_POST['input_jawaban2'];
        $jawaban3 = $_POST['input_jawaban3'];
        $abjad_benar = $_POST['input_abjad_benar'];
		if(!empty($kategori) && !empty($soal) && !empty($jawaban1) && !empty($jawaban2) && !empty($jawaban3) && !empty($abjad_benar)){
			$query_check = mysqli_query($connection, "SELECT * FROM tb_soal WHERE soal = '$soal' AND id_kategori = $kategori");
			if(mysqli_num_rows($query_check) == 0){
				$query_insert_soal = mysqli_query($connection, "INSERT INTO tb_soal VALUES (NULL, '$soal', $kategori, 0)");
                $query_select_soal = mysqli_query($connection, "SELECT * FROM tb_soal WHERE soal = '$soal'");
                $data_soal = mysqli_fetch_assoc($query_select_soal);
                $id_soal = $data_soal['id_soal'];
                
                $query_insert_option1 = mysqli_query($connection,"INSERT INTO tb_option VALUES(NULL, 'A', '$jawaban1', 0, $id_soal,0)");
                $query_insert_option2 = mysqli_query($connection,"INSERT INTO tb_option VALUES(NULL, 'B', '$jawaban2', 0, $id_soal,0)");
                $query_insert_option3 = mysqli_query($connection,"INSERT INTO tb_option VALUES(NULL, 'C', '$jawaban3', 0, $id_soal,0)");

                $query_select_option = mysqli_query($connection, "SELECT * FROM tb_option WHERE abjad = '$abjad_benar' AND id_soal = $id_soal");
                $data_option = mysqli_fetch_assoc($query_select_option);
                $id_option = $data_option['id_option'];

                $query_update_option = mysqli_query($connection,"UPDATE tb_option SET status_option = 1 WHERE id_option = $id_option");
				if($query_insert_soal && $query_insert_option1 && $query_insert_option2 && $query_insert_option3 && $query_update_option){
					echo "	<script>
			 					alert('Materi sukses ditambahkan');
			 					location.href = '../materi.php';
			 				</script>";
				}
				else{
					$pesan = "Materi gagal ditambahkan!";
				}
			}
			else{
				$pesan = "Materi sudah ada sebelumnya! Silahkan coba lagi!";
			}
		}
		else{
			$pesan = "Tolong isi semua form!";
		}

		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../tambah_materi.php';
			 	</script>";
	}	
	else{
		header('location: ../tambah_materi.php');
	}
?>