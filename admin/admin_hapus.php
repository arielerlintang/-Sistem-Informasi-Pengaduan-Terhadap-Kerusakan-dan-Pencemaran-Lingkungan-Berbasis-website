<?php 
include '../koneksi.php';
$id_admin = $_GET['id'];
$koneksi->query("DELETE FROM admin WHERE id_admin = '$id_admin' ");

		echo "<script>alert('Data Admin Di Hapus')</script>";
		echo "<script>location='index.php?page=admin'</script>";
 ?>