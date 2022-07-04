<?php  
	require_once "../../../config/koneksi.php";

	if(isset($_POST['submit'])){
		$nama_kategori = $_POST['input_nama_kategori'];
		$deskripsi = $_POST['input_deskripsi'];
		if(!empty($nama_kategori) && !empty($deskripsi)){
			$query_check = mysqli_query($connection, "SELECT * FROM tb_kategori WHERE nama_kategori = '$nama_kategori'");
			if(mysqli_num_rows($query_check) == 0){
				$query_insert = mysqli_query($connection, "INSERT INTO tb_kategori VALUES (NULL, '$nama_kategori', '$deskripsi', 0)");
				if($query_insert){
					echo "	<script>
			 					alert('Kategori sukses dibuat');
			 					location.href = '../kategori.php';
			 				</script>";
				}
				else{
					$pesan = "Kategori gagal dibuat!";
				}
			}
			else{
				$pesan = "Kategori sudah ada sebelumnya! Silahkan coba lagi!";
			}
		}
		else{
			$pesan = "Tolong isi semua form!";
		}

		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../tambah_kategori.php';
			 	</script>";
	}	
	else{
		header('location: ../tambah_kategori.php');
	}
?>