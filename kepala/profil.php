<?php include 'header.php' ?>
<?php 

$id_kepala = $_SESSION['kepala']['id_kepala'];
$ambil = $koneksi->query("SELECT * FROM kepala WHERE id_kepala='$id_kepala'");
$detail = $ambil->fetch_assoc();

?>


<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 shadow rounded bg-white p-5">
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Username</label>
					<input type="text" name="username" class="form-control" value="<?php echo $detail['username_kepala'] ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input type="text" name="password" class="form-control" value="">
				</div>
				<div class="mb-3">
					<label class="form-label">Nama</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $detail['nama_kepala'] ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Jenis Kelamin</label>
					<select name="jk" class="form-control">
						<option class="text-muted">pilih</option>
						<option value="Laki-laki" <?php if ($detail['jk_kepala']=="Laki-laki") {
							echo "selected";
						} ?>>Laki-laki</option>
						<option value="Perempuan"  <?php if ($detail['jk_kepala']=="Perempuan") {
							echo "selected";
						} ?>>Perempuan</option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Telpon</label>
					<input type="text" name="telpon" class="form-control" value="<?php echo $detail['telpon_kepala']; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Alamat</label>
					<textarea class="form-control" name="alamat"><?php echo $detail['alamat_kepala'] ?></textarea>
				</div>

				<div class="mb-3">
					<img src="../assets/files/kepala/<?php echo $detail['foto_kepala'] ?>" class="rounded" width="100">
					<br>
					<label class="form-label">Ganti Foto</label>
					<input type="file" name="foto" class="form-control" value="">
				</div>
				<div class="mb-3">
					<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
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

	if (empty($password)) {
		
		if (empty($filefoto)) {
			$koneksi->query("UPDATE kepala SET username_kepala='$username',
				nama_kepala='$nama',
				jk_kepala='$jk',
				telpon_kepala='$telpon',
				alamat_kepala='$alamat' WHERE id_kepala='$id_kepala'");
		}
		else
		{
			move_uploaded_file($filefoto, "../assets/files/kepala/$namafoto");

			$koneksi->query("UPDATE kepala SET username_kepala='$username',
				nama_kepala='$nama',
				jk_kepala='$jk',
				telpon_kepala='$telpon',
				alamat_kepala='$alamat',
				foto_kepala='$namafoto' WHERE id_kepala='$id_kepala'");
		}
	}
	else
	{
		if (empty($filefoto)) {
			$koneksi->query("UPDATE kepala SET username_kepala='$username',
				password_kepala='$password',
				nama_kepala='$nama',
				jk_kepala='$jk',
				telpon_kepala='$telpon',
				alamat_kepala='$alamat' WHERE id_kepala='$id_kepala'");
		}
		else
		{
			move_uploaded_file($filefoto, "../assets/files/kepala/$namafoto");

			$koneksi->query("UPDATE kepala SET username_kepala='$username',
				password_kepala='$password',
				nama_kepala='$nama',
				jk_kepala='$jk',
				telpon_kepala='$telpon',
				alamat_kepala='$alamat',
				foto_kepala='$namafoto' WHERE id_kepala='$id_kepala'");
		}	
	}

	echo "<script>alert('Data Di Ubah')</script>";
	echo "<script>location='profil.php'</script>";
}

?>
<?php include 'footer.php' ?>