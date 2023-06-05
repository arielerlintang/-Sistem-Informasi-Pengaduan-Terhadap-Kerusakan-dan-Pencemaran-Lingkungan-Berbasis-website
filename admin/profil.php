<?php 

$id_admin = $_SESSION['admin']['id_admin'];
$ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin='$id_admin'");
$detail = $ambil->fetch_assoc();

?>

<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 shadow rounded bg-white p-5">
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Username</label>
					<input type="text" name="username" class="form-control" value="<?php echo $detail['username_admin'] ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input type="text" name="password" class="form-control" value="">
				</div>
				<div class="mb-3">
					<label class="form-label">Nama</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $detail['nama_admin'] ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Jenis Kelamin</label>
					<select name="jk" class="form-control">
						<option class="text-muted">pilih</option>
						<option value="Laki-laki" <?php if ($detail['jk_admin']=="Laki-laki") {
							echo "selected";
						} ?>>Laki-laki</option>
						<option value="Perempuan"  <?php if ($detail['jk_admin']=="Perempuan") {
							echo "selected";
						} ?>>Perempuan</option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Telpon</label>
					<input type="text" name="telpon" class="form-control" value="<?php echo $detail['telpon_admin']; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Alamat</label>
					<textarea class="form-control" name="alamat"><?php echo $detail['alamat_admin'] ?></textarea>
				</div>

				<div class="mb-3">
					<img src="../assets/files/admin/<?php echo $detail['foto_admin'] ?>" class="rounded" width="100">
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
			$koneksi->query("UPDATE admin SET username_admin='$username',
				nama_admin='$nama',
				jk_admin='$jk',
				telpon_admin='$telpon',
				alamat_admin='$alamat' WHERE id_admin='$id_admin'");
		}
		else
		{
			move_uploaded_file($filefoto, "../assets/files/admin/$namafoto");

			$koneksi->query("UPDATE admin SET username_admin='$username',
				nama_admin='$nama',
				jk_admin='$jk',
				telpon_admin='$telpon',
				alamat_admin='$alamat',
				foto_admin='$namafoto' WHERE id_admin='$id_admin'");
		}
	}
	else
	{
		if (empty($filefoto)) {
			$koneksi->query("UPDATE admin SET username_admin='$username',
				password_admin='$password',
				nama_admin='$nama',
				jk_admin='$jk',
				telpon_admin='$telpon',
				alamat_admin='$alamat' WHERE id_admin='$id_admin'");
		}
		else
		{
			move_uploaded_file($filefoto, "../assets/files/admin/$namafoto");

			$koneksi->query("UPDATE admin SET username_admin='$username',
				password_admin='$password',
				nama_admin='$nama',
				jk_admin='$jk',
				telpon_admin='$telpon',
				alamat_admin='$alamat',
				foto_admin='$namafoto' WHERE id_admin='$id_admin'");
		}	
	}

	echo "<script>alert('Data Di Ubah')</script>";
	echo "<script>location='index.php?page=profil'</script>";
}

?>