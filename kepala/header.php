<?php 
session_start();
if (!isset($_SESSION['kepala'])) {
	
	echo "<script>alert('Anda Harus Login')</script>";
	echo "<script>location='../login.php'</script>";
}
$koneksi = new mysqli("localhost","root","","trainit_pengaduan");
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="generator" content="Hugo 0.108.0">
	<title>Kepala Aplikasi</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="../assets/css/dashboard.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<script src="../assets/js/jquery-3.5.1.js"></script>
</head>
<body class="bg-light">

	<header class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Kepala Aplikasi</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-nav">
			<div class="nav-item text-nowrap">
				<a class="nav-link px-3" href="logout.php">Sign out</a>
			</div>
		</div>
	</header>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white shadow sidebar collapse">
				<div class="position-sticky pt-3 sidebar-sticky">
					<div class="text-center">
						<i class="bi bi-person-circle display-4"></i>
						<h6><?php echo $_SESSION['kepala']['nama_kepala']; ?></h6>
						<span class="text-muted"><?php echo $_SESSION['kepala']['nama_kepala']; ?></span>
					</div>
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="index.php">
								<i class="bi bi-house"></i>
								Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="profil.php">
								<i class="bi bi-person-circle"></i>
								Profil
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="aduan_diajukan.php">
								<i class="bi bi-megaphone"></i>
								Aduan Masuk
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="aduan_ditolak.php">
								<i class="bi bi-arrow-right-circle"></i>
								Aduan DiTolak
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="aduan_diproses.php">
								<i class="bi bi-arrow-right-circle"></i>
								Aduan DiProses
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="aduan_selesai.php">
								<i class="bi bi-arrow-right-circle"></i>
								Aduan Selesai
							</a>
						</li>
					</ul>          
				</div>
			</nav>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-3">
				
			