<?php  
	session_start();
	require_once "../../config/koneksi.php";

	if(!isset($_SESSION['user_login']['id_admin'])){
        header('location: ../../auth/login.php');
      }

			$query_update = mysqli_query($connection, "UPDATE tb_datadiri SET id_gelombang = ''");
			if($query_update){
				$pesan = "Sukses mereset semua gelombang peserta!";
			}
			else{
				$pesan = "Sukses mereset semua gelombang peserta!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './peserta.php';
		 			</script>";
		
?>