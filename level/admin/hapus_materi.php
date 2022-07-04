<?php  
	session_start();
	require_once "../../config/koneksi.php";

	if(!isset($_SESSION['user_login']['id_admin'])){
        header('location: ../../auth/login.php');
      }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM tb_soal WHERE id_soal= $id");
		if(mysqli_num_rows($query_check) == 1){
			$query_delete_soal = mysqli_query($connection, "UPDATE tb_soal SET deleted = 1 WHERE id_soal = $id");
            $query_delete_option = mysqli_query($connection, "UPDATE tb_option SET deleted = 1 WHERE id_soal = $id");
			if($query_delete_soal && $query_delete_option){
				$pesan = "Materi sukses dihapus!";
			}
			else{
				$pesan = "Materi gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './materi.php';
		 			</script>";
		}
		else{
			header('location: ./materi.php');
		}
	}
	else{
		header('location: ./materi.php');
	}
?>