<?php  
	session_start();
	require_once "../../config/koneksi.php";

	if(!isset($_SESSION['user_login']['id_admin'])){
        header('location: ../../auth/login.php');
      }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM tb_gelombang WHERE id_gelombang = $id");
		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "UPDATE tb_gelombang SET deleted = 1 WHERE id_gelombang = $id");
			if($query_delete){
				$pesan = "Gelombang sukses dihapus!";
			}
			else{
				$pesan = "Gelombang gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './gelombang.php';
		 			</script>";
		}
		else{
			header('location: ./gelombang.php');
		}
	}
	else{
		header('location: ./gelombang.php');
	}
?>