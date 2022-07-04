<?php  
	session_start();
	require_once "../../config/koneksi.php";

	if(!isset($_SESSION['user_login']['id_admin'])){
        header('location: ../../auth/login.php');
      }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM tb_datadiri WHERE id_user = $id");
		if(mysqli_num_rows($query_check) == 1){
			$query_update = mysqli_query($connection, "UPDATE tb_datadiri SET deleted = 1 WHERE id_user = $id");
            $query_update2 = mysqli_query($connection, "UPDATE tb_users SET deleted = 1 WHERE id_user = $id");
            $query_update3 = mysqli_query($connection, "UPDATE tb_nilai SET deleted = 1 WHERE id_user = $id");
            $query_update4 = mysqli_query($connection, "UPDATE tb_riwayat SET deleted = 1 WHERE id_user = $id");
			if($query_update && $query_update2){
				$pesan = "Sukses menghapus peserta!";
			}
			else{
				$pesan = "Gagal menghapus peserta!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './peserta.php';
		 			</script>";
		}
		else{
			header('location: ./peserta.php');
		}
	}
	else{
		header('location: ./peserta.php');
	}
?>