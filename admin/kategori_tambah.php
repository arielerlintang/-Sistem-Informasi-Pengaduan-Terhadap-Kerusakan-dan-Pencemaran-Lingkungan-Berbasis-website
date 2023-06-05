<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 card shadow bg-white p-5 my-5">
			<h6>Tambah Kategori</h6>
			<form method="post">
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control">
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
 	$koneksi->query("INSERT INTO kategori (nama_kategori) VALUES('$nama')");
 	echo "<script>alert('Data Di Tambah');window.location='index.php?page=kategori'</script>";
 } 
 ?>