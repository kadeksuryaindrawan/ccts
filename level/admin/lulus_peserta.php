<?php  
	session_start();
	require_once "../../config/koneksi.php";

	if(!isset($_SESSION['user_login']['id_admin'])){
        header('location: ../../auth/login.php');
      }

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id = $_GET['id'];
        $id_gelombang = $_GET['idgelombang'];
		$query_check= mysqli_query($connection, "SELECT * FROM tb_datadiri WHERE id_user = $id");
		if(mysqli_num_rows($query_check) == 1){
			$query_update = mysqli_query($connection, "UPDATE tb_datadiri SET status_user = 'lulus' WHERE id_user = $id");
            $query_update2 = mysqli_query($connection, "UPDATE tb_riwayat SET status_user = 'lulus' WHERE id_user = $id AND id_gelombang = $id_gelombang");
			if($query_update && $query_update2){
				$pesan = "Sukses meluluskan peserta!";
			}
			else{
				$pesan = "Gagal meluluskan peserta!";
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