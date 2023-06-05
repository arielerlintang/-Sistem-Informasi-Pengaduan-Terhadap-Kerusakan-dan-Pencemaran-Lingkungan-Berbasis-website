<?php
$id_kategori =$_GET["id"]; 
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori = '$id_kategori' ");
$kategori = $ambil->fetch_assoc();
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 card shadow bg-white p-5 my-5">
			<h6>Ubah Kategori</h6>
			<form method="post">
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $kategori['nama_kategori'] ?>">
				</div>
				<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
</div>
<?php
if (isset($_POST["simpan"]))
 {
 	$nama = $_POST["nama"];
 	$koneksi->query("UPDATE kategori SET nama_kategori = '$nama' WHERE id_kategori = '$id_kategori' ");
 	echo "<script>alert('Data Di Ubah');window.location='index.php?page=kategori'</script>";
 } 
 ?>