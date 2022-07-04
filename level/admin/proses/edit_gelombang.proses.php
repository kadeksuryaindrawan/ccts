<?php  
	require_once "../../../config/koneksi.php";
	if(isset($_POST['submit'])){
		$nama_gelombang = $_POST['input_gelombang'];
		$id_gelombang = $_POST['id_gelombang'];
		if(!empty(is_numeric($nama_gelombang)) && is_numeric($id_gelombang)){
            if($nama_gelombang > 0){
                $query_gelombang_lama = mysqli_query($connection, "SELECT * FROM tb_gelombang WHERE id_gelombang = $id_gelombang");
                $data_gelombang_lama = mysqli_fetch_assoc($query_gelombang_lama);
                $nama_gelombang_lama = $data_gelombang_lama['nama_gelombang'];
                $query_check = mysqli_query($connection, "SELECT * FROM tb_gelombang WHERE nama_gelombang = '$nama_gelombang' AND nama_gelombang != '$nama_gelombang_lama'");
                if(mysqli_num_rows($query_check) == 0){
                    $query_update = mysqli_query($connection, "UPDATE tb_gelombang SET nama_gelombang = '$nama_gelombang' WHERE id_gelombang = $id_gelombang");
                    if($query_update){
                        $pesan = "Gelombang sukses di edit!";
                    }
                    else{
                        $pesan = "Gelombang gagal di edit!";
                    }
                }
                else{
                    $pesan = "Gelombang sudah ada sebelumnya!";
                }
            }
            else{
                $pesan = "Gelombang harus lebih dari 0!";
            }
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../gelombang.php';
			 	</script>";
	}
	else{
		header('location: ../gelombang.php');
	}
?>