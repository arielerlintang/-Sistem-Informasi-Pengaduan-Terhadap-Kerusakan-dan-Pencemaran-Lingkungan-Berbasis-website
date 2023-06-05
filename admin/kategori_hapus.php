<?php
$id_kategori = $_GET["id"]; 

$koneksi->query("DELETE FROM kategori WHERE id_kategori = '$id_kategori' ");

	echo "<script>alert('Data Di Hapus');window.location='index.php?page=kategori'</script>";

 ?>