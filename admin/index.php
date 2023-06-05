<?php 
session_start();
if (!isset($_SESSION['admin'])) {
	
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
	<title>Administrator</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="../assets/css/dashboard.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<script src="../assets/js/jquery-3.5.1.js"></script>
</head>
<body class="bg-light">

	<header class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Admin Aplikasi</a>
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
						<h6><?php echo $_SESSION['admin']['nama_admin']; ?></h6>
						<span class="text-muted"><?php echo $_SESSION['admin']['nama_admin']; ?></span>
					</div>
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="index.php">
								<i class="bi bi-house"></i>
								Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=profil">
								<i class="bi bi-person-circle"></i>
								Profil
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=identitas">
								<i class="bi bi-geo-alt"></i>
								Identitas
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=kategori">
								<i class="bi bi-tags"></i>
								Kategori Berita
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=berita">
								<i class="bi bi-list-columns-reverse"></i>
								Berita
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=aduan_diajukan">
								<i class="bi bi-megaphone"></i>
								Aduan Masuk
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=aduan_ditolak">
								<i class="bi bi-arrow-right-circle"></i>
								Aduan DiTolak
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=aduan_diproses">
								<i class="bi bi-arrow-right-circle"></i>
								Aduan DiProses
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=aduan_selesai">
								<i class="bi bi-arrow-right-circle"></i>
								Aduan Selesai
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=masyarakat">
								<i class="bi bi-people"></i>
								Kelola Masyarakat
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=admin">
								<i class="bi bi-people-fill"></i>
								Kelola Admin
							</a>
						</li>
					</ul>          
				</div>
			</nav>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-3">
				<?php 
				if (!isset($_GET['page'])) {
					
					include 'dashboard.php';
				}
				elseif($_GET['page']=="profil")
				{
					include 'profil.php';
				}
				elseif($_GET['page']=="aduan_diajukan")
				{
					include 'aduan_diajukan.php';

				}
				elseif($_GET['page']=="aduan_diajukan_detail")
				{
					include 'aduan_diajukan_detail.php';
				}

				// aduan di tolak
				elseif($_GET['page']=="aduan_ditolak")
				{
					include 'aduan_ditolak.php';

				}
				elseif($_GET['page']=="aduan_ditolak_detail")
				{
					include 'aduan_ditolak_detail.php';
				}

				// aduan di proses
				elseif($_GET['page']=="aduan_diproses")
				{
					include 'aduan_diproses.php';

				}
				elseif($_GET['page']=="aduan_diproses_detail")
				{
					include 'aduan_diproses_detail.php';
				}
				// aduan selesai
				elseif($_GET['page']=="aduan_selesai")
				{
					include 'aduan_selesai.php';

				}
				elseif($_GET['page']=="aduan_selesai_detail")
				{
					include 'aduan_selesai_detail.php';
				}
				// masyarakat
				elseif($_GET['page']=="masyarakat")
				{
					include 'masyarakat.php';

				}
				
				elseif($_GET['page']=="masyarakat_detail")
				{
					include 'masyarakat_detail.php';
				}
				elseif($_GET['page']=="masyarakat_hapus")
				{
					include 'masyarakat_hapus.php';
				}
				// masyarakat
				elseif($_GET['page']=="identitas")
				{
					include 'identitas.php';

				}
				// kategori berita dan berita
				elseif ($_GET["page"]=="kategori")
				{
					include 'kategori.php';
				}
				elseif ($_GET["page"]=="kategori_ubah")
				{
					include 'kategori_ubah.php';
				} 
				elseif ($_GET["page"]=="kategori_tambah")
				{
					include 'kategori_tambah.php';
				} 
				elseif ($_GET["page"]=="kategori_hapus")
				{
					include 'kategori_hapus.php';
				}

				elseif ($_GET["page"]=="berita")
				{
					include 'berita.php';
				}
				elseif ($_GET["page"]=="berita_hapus")
				{
					include 'berita_hapus.php';
				}
				elseif ($_GET["page"]=="berita_detail")
				{
					include 'berita_detail.php';
				}  
				elseif ($_GET["page"]=="berita_tambah")
				{
					include 'berita_tambah.php';
				}
				elseif ($_GET["page"]=="berita_ubah")
				{
					include 'berita_ubah.php';
				}  

				// admin
				elseif ($_GET["page"]=="admin")
				{
					include 'admin.php';
				}  
				elseif ($_GET["page"]=="admin_tambah")
				{
					include 'admin_tambah.php';
				}  
				?>
			</main>
		</div>
	</div>

	<script src="../assets/js/bootstrap.bundle.js"></script>
	<script src="../assets/js/jquery.dataTables.min.js"></script>
	<script src="../assets/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#table').DataTable();
		});
	</script>
</body>
</html>
