<?php  
	session_start();
	require_once "../../config/koneksi.php";

	if(!isset($_SESSION['user_login']['id_admin'])){
        header('location: ../../auth/login.php');
      }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
		$query_check= mysqli_query($connection, "SELECT * FROM tb_kategori WHERE id_kategori= $id");
		if(mysqli_num_rows($query_check) == 1){
			$query_delete= mysqli_query($connection, "UPDATE tb_kategori SET deleted = 1 WHERE id_kategori = $id");
			if($query_delete){
				$pesan = "Kategori sukses dihapus!";
			}
			else{
				$pesan = "Kategori gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './kategori.php';
		 			</script>";
		}
		else{
			header('location: ./kategori.php');
		}
	}
	else{
		header('location: ./kategori.php');
	}
?>