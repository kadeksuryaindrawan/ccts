<?php  
	require_once "../../../config/koneksi.php";

	if(isset($_POST['submit'])){
        $id_user = $_POST['id_user'];
		$kategori = $_POST['input_kategori'];
        $no_ktp = $_POST['input_no_ktp'];
		$nama_lengkap = $_POST['input_nama_lengkap'];
        $alamat = $_POST['input_alamat'];

        $foto_profil_name = $_FILES['input_foto_profil']['name'];
        $foto_ktp_name = $_FILES['input_foto_ktp']['name'];

        $foto_profil_size = $_FILES['input_foto_profil']['size'];
        $foto_ktp_size = $_FILES['input_foto_ktp']['size'];

        $foto_profil_tmp = $_FILES['input_foto_profil']['tmp_name'];
        $foto_ktp_tmp = $_FILES['input_foto_ktp']['tmp_name'];

        $status_pekerjaan = $_POST['input_status_pekerjaan'];
		if(is_numeric($id_user) && !empty($kategori) && !empty(is_numeric($no_ktp)) && !empty($nama_lengkap) && !empty($alamat) && !empty($foto_profil_name) && !empty($foto_ktp_name) && !empty($status_pekerjaan)){
			$extensi_gambar_valid = ['jpg', 'jpeg', 'png'];
			$extensi_gambar = explode('.', $foto_profil_name);
			$extensi_gambar = strtolower(end($extensi_gambar));
			$extensi_gambar_2 = explode('.', $foto_ktp_name);
			$extensi_gambar_2 = strtolower(end($extensi_gambar_2));
            if(in_array($extensi_gambar, $extensi_gambar_valid) && in_array($extensi_gambar_2, $extensi_gambar_valid)){
                $max_size = 2 * (1024 * 1024);
                if($foto_profil_size < $max_size && $foto_ktp_size < $max_size){
                    $query_check = mysqli_query($connection, "SELECT * FROM tb_datadiri WHERE no_ktp = '$no_ktp'");
                    if(mysqli_num_rows($query_check) == 0){
                        $nama_baru = uniqid(1) . "." . $extensi_gambar;
						$nama_baru_2 = uniqid(2) . "." . $extensi_gambar_2;
                        $query_insert = mysqli_query($connection, "INSERT INTO tb_datadiri VALUES (NULL, $id_user, $kategori, '$no_ktp', '$nama_lengkap', '$alamat', '$nama_baru', '$nama_baru_2', '$status_pekerjaan', 'proses', 0,'')");
                        $query_update = mysqli_query($connection,"UPDATE tb_users SET status_daftar = 'sudah' WHERE id_user = $id_user");
                        if($query_insert && $query_update && move_uploaded_file($foto_profil_tmp , '../../assets/images/upload/profil/' . $nama_baru) 
                        && move_uploaded_file($foto_ktp_tmp , '../../assets/images/upload/ktp/' . $nama_baru_2)){
                            echo "	<script>
                                        alert('Terima kasih telah mengisi data!');
                                        location.href = '../dashboard.user.php';
                                    </script>";
                        }
                        else{
                            $pesan = "Gagal mengisi data!";
                        }
                    }
                    else{
                        $pesan = "Data sudah ada sebelumnya! Silahkan coba lagi!";
                    }
                }
                else{
                    $pesan = "Size foto terlalu besar!";
                }
            }
            else{
                $pesan = "Anda harus mengupload gambar dengan extensi jpg/jpeg/png!";
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