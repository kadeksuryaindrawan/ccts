<?php  
	session_start();
	require_once "../../config/koneksi.php";

	if(!isset($_SESSION['user_login']['id_user'])){
        header('location: ../../auth/login.php');
      }

	if(isset($_GET['iduser']) && !empty($_GET['iduser']) && is_numeric($_GET['iduser']) && isset($_GET['idgelombang']) && !empty($_GET['idgelombang']) && is_numeric($_GET['idgelombang'])){
		$id_user = $_GET['iduser'];
        $id_gelombang = $_GET['idgelombang'];
		$query_check= mysqli_query($connection, "SELECT * FROM tb_datadiri WHERE id_user = $id_user");
		$data_user = mysqli_fetch_assoc($query_check);
		$status_user = $data_user['status_user'];
		if(mysqli_num_rows($query_check) == 1){
			
			if($status_user == 'tidak lulus'){
				$query_select = mysqli_query($connection,"SELECT * FROM tb_nilai WHERE id_user = $id_user");
				if(mysqli_num_rows($query_select) > 0){
					$data_nilai = mysqli_fetch_assoc($query_select);
					$id_kategori = $data_nilai['id_kategori'];
					$nilai_dulu = $data_nilai['nilai'];
					$query_insert_nilai = mysqli_query($connection,"INSERT INTO tb_nilai VALUES (NULL, $id_user, $id_kategori, $id_gelombang, $nilai_dulu, 0)");
					$query_update = mysqli_query($connection, "UPDATE tb_datadiri SET id_gelombang = '$id_gelombang', status_user = 'sudah jawab' WHERE id_user = $id_user");
					$query_insert = mysqli_query($connection, "INSERT INTO tb_riwayat VALUES(NULL,$id_user,$id_gelombang,'sedang proses',0)");
					if($query_insert_nilai && $query_update && $query_insert){
						$pesan = "Daftar gelombang sukses!";
					}
					else{
						$pesan = "Daftar gelombang gagal!";
					}
				}
				else{
					$query_update = mysqli_query($connection, "UPDATE tb_datadiri SET id_gelombang = '$id_gelombang', status_user = 'sudah jawab' WHERE id_user = $id_user");
					$query_insert = mysqli_query($connection, "INSERT INTO tb_riwayat VALUES(NULL,$id_user,$id_gelombang,'sedang proses',0)");
					if($query_update && $query_insert){
						$pesan = "Daftar gelombang sukses!";
					}
					else{
						$pesan = "Daftar gelombang gagal!";
					}
				}
				
			}
			else{
				$query_select = mysqli_query($connection,"SELECT * FROM tb_nilai WHERE id_user = $id_user");
				if(mysqli_num_rows($query_select) > 0){
					$data_nilai = mysqli_fetch_assoc($query_select);
					$id_kategori = $data_nilai['id_kategori'];
					$nilai_dulu = $data_nilai['nilai'];
					$query_insert_nilai = mysqli_query($connection,"INSERT INTO tb_nilai VALUES (NULL, $id_user, $id_kategori, $id_gelombang, $nilai_dulu, 0)");
					$query_update = mysqli_query($connection, "UPDATE tb_datadiri SET id_gelombang = '$id_gelombang' WHERE id_user = $id_user");
					$query_insert = mysqli_query($connection, "INSERT INTO tb_riwayat VALUES(NULL,$id_user,$id_gelombang,'belum jawab',0)");
					if($query_insert_nilai && $query_update && $query_insert){
						$pesan = "Daftar gelombang sukses!";
					}
					else{
						$pesan = "Daftar gelombang gagal!";
					}
				}
				else{
					$query_update = mysqli_query($connection, "UPDATE tb_datadiri SET id_gelombang = '$id_gelombang' WHERE id_user = $id_user");
					$query_insert = mysqli_query($connection, "INSERT INTO tb_riwayat VALUES(NULL,$id_user,$id_gelombang,'belum jawab',0)");
					if($query_update && $query_insert){
						$pesan = "Daftar gelombang sukses!";
					}
					else{
						$pesan = "Daftar gelombang gagal!";
					}
				}
				
			}
			
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './dashboard.user.php';
		 			</script>";
		}
		else{
			header('location: ./dashboard.user.php');
		}
	}
	else{
		header('location: ./dashboard.user.php');
	}
?>