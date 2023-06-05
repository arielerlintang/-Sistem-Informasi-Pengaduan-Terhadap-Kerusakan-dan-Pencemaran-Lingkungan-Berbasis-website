<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 shadow rounded bg-white p-5 my-5">
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Username</label>
					<input type="text" name="username" class="form-control" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input type="password" name="password" class="form-control" required value="">
				</div>
				<div class="mb-3">
					<label class="form-label">Nama</label>
					<input type="text" name="nama" class="form-control" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Jenis Kelamin</label>
					<select name="jk" class="form-control" required>
						<option class="text-muted">pilih</option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Telpon</label>
					<input type="number" name="telpon" class="form-control" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Alamat</label>
					<textarea class="form-control" required name="alamat"></textarea>
				</div>
				<div class="mb-3">
					<label class="form-label">Foto</label>
					<input type="file" name="foto" class="form-control" required>
				</div>
				<div class="mb-3">
					<button type="submit" name="simpan" class="btn btn-primary">Daftar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
if (isset($_POST['simpan'])) {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$telpon = $_POST['telpon'];
	$alamat = $_POST['alamat'];
	

	$namafoto = $_FILES['foto']['name'];
	$filefoto = $_FILES['foto']['tmp_name'];

   $ambil = $koneksi->query("SELECT * FROM admin WHERE username_admin='$username'");

	$cek = $ambil->num_rows;

	if ($cek==1) {
		echo "<script>alert('Gunakana Username Lain')</script>";
	}
	else
	{
		
		move_uploaded_file($filefoto, 'assets/files/admin/'.$namafoto);

		$koneksi->query("INSERT INTO admin(username_admin,password_admin,nama_admin,jk_admin,telpon_admin,alamat_admin,foto_admin) VALUES('$username','$password','$nama','$jk','$telpon','$alamat','$namafoto') ");

		echo "<script>alert('Berhasil')</script>";
		echo "<script>location='index.php?page=admin'</script>";

	}
}

 ?>