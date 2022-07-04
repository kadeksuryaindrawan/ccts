<?php  

	require_once "../../config/koneksi.php";
	session_start();

	if(isset($_POST['register'])){
		$email_address = $_POST['input_email'];
		$password = $_POST['input_password'];
		$repassword = $_POST['input_repassword'];

		if(!empty($email_address) && !empty($password) && !empty($repassword)){
			if($password == $repassword){
				if(strlen($password) >= 7 ){
					$query_check = mysqli_query($connection, "SELECT * FROM tb_users WHERE email = '$email_address'");
					if(mysqli_num_rows($query_check) == 0){
						$encrypted_password = password_hash($password,PASSWORD_BCRYPT, ['cost' => 12]);
						$query_insert = mysqli_query($connection, "INSERT INTO tb_users VALUES (NULL, '$email_address', '$encrypted_password', 'user','belum',0)");
						if($query_insert){
							$query_check = mysqli_query($connection, "SELECT * FROM tb_users WHERE email = '$email_address'");
							$data_user = mysqli_fetch_assoc($query_check);
							$level_user = $data_user['level_user'];
							if($level_user == 'admin'){
								$_SESSION['user_login']['email'] = $data_user['email'];
								$_SESSION['user_login']['id_admin'] = $data_user['id_user'];
		
								echo"
										<script>
											alert('Daftar Sukses');
											location.href = '../../level/admin/dashboard.admin.php';
										</script>
									";
							}
							else if($level_user == 'user'){
								$_SESSION['user_login']['email'] = $data_user['email'];
								$_SESSION['user_login']['id_user'] = $data_user['id_user'];
		
								echo"
		
										<script>
											alert('Daftar Sukses');
											location.href = '../../level/user/dashboard.user.php';
										</script>
									";
							}
						}
						else{
							$pesan = "Gagal daftar!";
						}
					}
					else{
						$pesan = "Email sudah terdaftar sebelumnya! Silahkan ulangi mendaftar";
					}
				}
				else{
					$pesan = "Password setidaknya harus terdiri dari 7 karakter / lebih!";
				}
			}
			else{
				$pesan = "Password tidak boleh berbeda!";
			}
		}
		else{
			$pesan = "Tolong Isikan Sesuatu!";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../register.php'
				</script>
			";
	}
	else{
		header('location: ../register.php');
	}

?>