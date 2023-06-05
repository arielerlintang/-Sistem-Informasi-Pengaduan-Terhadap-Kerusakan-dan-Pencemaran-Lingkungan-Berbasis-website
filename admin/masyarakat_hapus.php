<?php 
$id_masyarakat = $_GET['id'];
$koneksi->query("DELETE FROM masyarakat WHERE id_masyarakat='$id_masyarakat'");

echo "<script>alert('Berhasil')</script>";
echo "<script>location='index.php?page=masyarakat'</script>";
 ?>