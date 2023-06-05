<?php 


$id_berita = $_GET["id"]; 

$koneksi->query("DELETE FROM berita WHERE id_berita = '$id_berita' ");
   
echo "<script>alert('Data Berita Di Hapus')</script>";
       
echo "<script>location='index.php?page=berita'</script>";
 
 ?>