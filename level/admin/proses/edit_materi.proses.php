<?php  
	require_once "../../../config/koneksi.php";
	if(isset($_POST['submit'])){
		$kategori = $_POST['input_kategori'];
		$soal = $_POST['input_soal'];
        $jawaban1 = $_POST['input_jawaban1'];
        $jawaban2 = $_POST['input_jawaban2'];
        $jawaban3 = $_POST['input_jawaban3'];
        $abjad_benar = $_POST['input_abjad_benar'];
		$id_soal = $_POST['id_soal'];
        $id_optiona = $_POST['id_optiona'];
        $id_optionb = $_POST['id_optionb'];
        $id_optionc = $_POST['id_optionc'];
		if(!empty($kategori) && !empty($soal) && !empty($jawaban1) && !empty($jawaban2) && !empty($jawaban3) && !empty($abjad_benar) && is_numeric($id_soal)){
 			
 				$query_update_soal = mysqli_query($connection, "UPDATE tb_soal SET soal = '$soal', id_kategori = $kategori WHERE id_soal = $id_soal");
                
                $query_update_option1 = mysqli_query($connection, "UPDATE tb_option SET text_abjad = '$jawaban1', status_option = 0 WHERE id_option = $id_optiona");
                $query_update_option2 = mysqli_query($connection, "UPDATE tb_option SET text_abjad = '$jawaban2', status_option = 0 WHERE id_option = $id_optionb");
                $query_update_option3 = mysqli_query($connection, "UPDATE tb_option SET text_abjad = '$jawaban3', status_option = 0 WHERE id_option = $id_optionc");

                $query_select_option = mysqli_query($connection, "SELECT * FROM tb_option WHERE abjad = '$abjad_benar' AND id_soal = $id_soal");
                $data_option = mysqli_fetch_assoc($query_select_option);
                $id_option = $data_option['id_option'];

                $query_update_abjad = mysqli_query($connection,"UPDATE tb_option SET status_option = 1 WHERE id_option = $id_option");
 				if($query_update_soal && $query_update_option1 && $query_update_option2 && $query_update_option3 && $query_update_abjad){
 					$pesan = "Materi sukses di edit!";
 				}
 				else{
 					$pesan = "Materi gagal di edit!";
 				}
 			
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../materi.php';
			 	</script>";
	}
	else{
		header('location: ../materi.php');
	}
?>