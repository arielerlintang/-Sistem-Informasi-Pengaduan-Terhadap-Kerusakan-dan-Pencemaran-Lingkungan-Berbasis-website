<?php
session_start();
include 'koneksi.php';


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<title>login</title>
</head>
<body class="bg-light">

	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4 mt-5 shadow rounded bg-white p-5">
				<div class="text-center">
					<img src="assets/files/desa/Lambang_Kab_Indragiri_Hulu.png" width="150">
					<h6>Login </h6>
				</div>
				<form method="post">
					<div class="mb-3">
						<label>Username</label>
						<input type="text" name="username" class="form-control">
					</div>
					<div class="mb-3">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<button class="btn btn-primary" name="login" type="submit">LOGIN</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php 
// jika isset = ada yombol login maka 
if (isset($_POST["login"])) {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	
	$ambil_admin = $koneksi->query("SELECT * FROM admin WHERE username_admin='$username' AND password_admin='$password' ");

	$cek_admin = $ambil_admin->num_rows;

	// masyarakat
	

	$ambil_masyarakat = $koneksi->query("SELECT * FROM masyarakat WHERE username_masyarakat='$username' AND password_masyarakat='$password' ");

	$cek_masyarakat = $ambil_masyarakat->num_rows;

	// kepala
	

	$ambil_kepala = $koneksi->query("SELECT * FROM kepala WHERE username_kepala='$username' AND password_kepala='$password' ");

	$cek_kepala = $ambil_kepala->num_rows;


	if ($cek_admin==1) 
	{
		$login_admin = $ambil_admin->fetch_assoc();
		$_SESSION['admin'] = $login_admin;

		echo "<script>alert('Anda Berhasil Login')</script>";
		echo "<script>location='admin/index.php'</script>";
		
	}
	elseif ($cek_masyarakat==1) {
		$login_masyarakat = $ambil_masyarakat->fetch_assoc();
		$_SESSION['masyarakat'] = $login_masyarakat;

		echo "<script>alert('Anda Berhasil Login')</script>";
		echo "<script>location='masyarakat/index.php'</script>";

	}
	elseif ($cek_kepala==1) {
		$login_kepala = $ambil_kepala->fetch_assoc();
		$_SESSION['kepala'] = $login_kepala;

		echo "<script>alert('Anda Berhasil Login')</script>";
		echo "<script>location='kepala/index.php'</script>";

	}
	else
	{
		echo "<script>alert('Anda Gagal Login')</script>";
		echo "<script>location='login.php'</script>";
	}

}



?>