<?php  
	require_once "../../../config/koneksi.php";

	if(isset($_POST['submit'])){
		$id_user = $_POST['input_id_user'];
        $id_kategori = $_POST['input_id_kategori'];
        $id_gelombang = $_POST['input_id_gelombang'];
		$nilai = $_POST['input_nilai'];
		if(!empty(is_numeric($id_user)) && !empty(is_numeric($id_kategori)) && !empty(is_numeric($id_gelombang)) && !empty(is_numeric($nilai))){
				$query_insert = mysqli_query($connection, "INSERT INTO tb_nilai VALUES (NULL, $id_user, $id_kategori, $id_gelombang, $nilai, 0)");
                $query_update = mysqli_query($connection,"UPDATE tb_datadiri SET status_user = 'sudah jawab' WHERE id_user = $id_user");
				$query_update2 = mysqli_query($connection,"UPDATE tb_riwayat SET status_user = 'sedang proses' WHERE id_user = $id_user");
				if($query_insert && $query_update){
					echo "	<script>
			 					alert('Sukses menjawab semua soal !');
			 					location.href = '../dashboard.user.php';
			 				</script>";
				}
				else{
					$pesan = "Gagal menjawab soal!";
				}
		}
		else{
			$pesan = "Tolong isi semua form!";
		}

		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../dashboard.user.php';
			 	</script>";
	}	
	else{
		header('location: ../dashboard.user.php');
	}
?>