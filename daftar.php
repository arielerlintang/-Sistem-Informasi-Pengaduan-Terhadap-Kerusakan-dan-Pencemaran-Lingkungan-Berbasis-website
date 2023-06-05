<?php include 'header.php' ?>

<div class="container">
	<div class="row">
		<div class="col-md-5">
			
		</div>
		<div class="col-md-6 offset-md-1 shadow rounded bg-white p-5 my-5">
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
					<label class="form-label">Rt/Rw</label>
					<input type="text" name="rt_rw" class="form-control" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Dusun</label>
					<input type="text" name="dusun" class="form-control" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Desa</label>
					<input type="text" name="desa" class="form-control" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Kecamatan</label>
					<input type="text" name="kecamatan" class="form-control" required>
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
	$rt_rw = $_POST['rt_rw'];
	$dusun = $_POST['dusun'];
	$desa = $_POST['desa'];
	$kecamatan = $_POST['kecamatan'];

	$namafoto = $_FILES['foto']['name'];
	$filefoto = $_FILES['foto']['tmp_name'];

	$ambil = $koneksi->query("SELECT * FROM masyarakat WHERE username_masyarakat='$username'");

	$cek = $ambil->num_rows;
	if ($cek==1) {
		echo "<script>alert('Gunakana Username Lain')</script>";
	}
	else
	{
		
		move_uploaded_file($filefoto, 'assets/files/masyarakat/'.$namafoto);

		$koneksi->query("INSERT INTO masyarakat(username_masyarakat,password_masyarakat,nama_masyarakat,jk_masyarakat,telpon_masyarakat,alamat_masyarakat,rt_rw_masyarakat,dusun_masyarakat,desa_masyarakat,kecamatan_masyarakat,foto_masyarakat) VALUES('$username','$password','$nama','$jk','$telpon','$alamat','$rt_rw','$dusun','$desa','$kecamatan','$namafoto') ");

		echo "<script>alert('Berhasil Mendaftar')</script>";
		echo "<script>location='login.php'</script>";

	}


	
}
?>


<?php include 'footer.php' ?>