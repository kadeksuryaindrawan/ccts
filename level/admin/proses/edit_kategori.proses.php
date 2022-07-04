<?php  
	require_once "../../../config/koneksi.php";
	if(isset($_POST['submit'])){
		$nama_kategori = $_POST['input_nama_kategori'];
		$deskripsi = $_POST['input_deskripsi'];
		$id_kategori = $_POST['id_kategori'];
		if(!empty($nama_kategori) && !empty($deskripsi) && is_numeric($id_kategori)){
 			$query_kategori_lama = mysqli_query($connection, "SELECT * FROM tb_kategori WHERE id_kategori = $id_kategori");
 			$data_kategori_lama = mysqli_fetch_assoc($query_kategori_lama);
 			$nama_kategori_lama = $data_kategori_lama['nama_kategori'];
 			$query_check = mysqli_query($connection, "SELECT * FROM tb_kategori WHERE nama_kategori = '$nama_kategori' AND nama_kategori != '$nama_kategori_lama'");
 			if(mysqli_num_rows($query_check) == 0){
 				$query_update_category = mysqli_query($connection, "UPDATE tb_kategori SET nama_kategori = '$nama_kategori', deskripsi = '$deskripsi' WHERE id_kategori = $id_kategori");
 				if($query_update_category){
 					$pesan = "Kategori sukses di edit!";
 				}
 				else{
 					$pesan = "Kategori gagal di edit!";
 				}
 			}
 			else{
 				$pesan = "Kategori Duplikat!";
 			}
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../kategori.php';
			 	</script>";
	}
	else{
		header('location: ../kategori.php');
	}
?>