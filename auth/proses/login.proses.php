<?php
	require_once "../../config/koneksi.php";
	session_start();

	if(isset($_POST['login'])){
		$email_address = $_POST['input_email'];
		$password = $_POST['input_password'];

		if(!empty($email_address) && !empty($password)){
			$query_check = mysqli_query($connection, "SELECT * FROM tb_users WHERE email = '$email_address'");

			if(mysqli_num_rows($query_check) == 1){
				$query_check2 = mysqli_query($connection, "SELECT * FROM tb_users WHERE email = '$email_address' AND deleted = 0");
				if(mysqli_num_rows($query_check2) == 1){
					$data_user = mysqli_fetch_assoc($query_check);
					$encrypted_password = $data_user['password'];

					if(password_verify($password,$encrypted_password)){
						$level_user = $data_user['level_user'];

						if($level_user == 'admin'){
							$_SESSION['user_login']['email'] = $data_user['email'];
							$_SESSION['user_login']['id_admin'] = $data_user['id_user'];

							echo"
									<script>
										alert('Login Sukses');
										location.href = '../../level/admin/dashboard.admin.php';
									</script>
								";
						}
						else if($level_user == 'user'){
							$_SESSION['user_login']['email'] = $data_user['email'];
							$_SESSION['user_login']['id_user'] = $data_user['id_user'];

							echo"

									<script>
										alert('Login Sukses');
										location.href = '../../level/user/dashboard.user.php';
									</script>
								";
						}
						else{
							$pesan = "Gagal login!";
						}
					}
					else{
						$pesan = "Email / Password Salah!";
					}
				}
				else{
					$pesan = "Akun anda di ban oleh admin!";
				}
				
			}
			else{
				$pesan = "Email / Password tidak terdaftar!";
			}
		}
		else{
			$pesan = "Isikan sesuatu!";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../login.php'
				</script>
			";

	}
	else{
		header("location: ../login.php");
	}

?>