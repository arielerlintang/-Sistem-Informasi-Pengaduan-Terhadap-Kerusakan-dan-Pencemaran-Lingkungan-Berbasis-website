<?php include 'header.php'; ?>
<?php 
$id_masyarakat = $_SESSION['masyarakat']['id_masyarakat'];
$ambil = $koneksi->query("SELECT * FROM masyarakat WHERE id_masyarakat='$id_masyarakat' ");
$detail = $ambil->fetch_assoc();

?>
<div class="container my-5">
	<div class="row">
		<div><span>Profil</span>/</div>
		<div class="col-md-8 offset-md-2 shadow bg-white rounded p-5">
			<h6>Profil</h6>
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Username</label>
					<input type="text" name="username" class="form-control" value="<?php echo $detail['username_masyarakat'] ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input type="password" name="password" class="form-control" value="">
				</div>
				<div class="mb-3">
					<label class="form-label">Nama</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $detail['nama_masyarakat'] ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Jenis Kelamin</label>
					<select name="jk" class="form-control">
						<option class="text-muted">pilih</option>
						<option value="Laki-laki" <?php if ($detail['jk_masyarakat']=="Laki-laki") {
							echo "selected";
						} ?>>Laki-laki</option>
						<option value="Perempuan" <?php if ($detail['jk_masyarakat']=="Perempuan") {
							echo "selected";
						} ?>>Perempuan</option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Telpon</label>
					<input type="number" name="telpon" class="form-control" value="<?php echo $detail['telpon_masyarakat'] ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Alamat</label>
					<textarea class="form-control" name="alamat"><?php echo $detail['alamat_masyarakat'] ?></textarea>
				</div>
				<div class="mb-3">
					<label class="form-label">Rt/Rw</label>
					<input type="text" name="rt_rw" class="form-control" value="<?php echo $detail['rt_rw_masyarakat'] ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Dusun</label>
					<input type="text" name="dusun" class="form-control" value="<?php echo $detail['dusun_masyarakat'] ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Desa</label>
					<input type="text" name="desa" class="form-control" value="<?php echo $detail['desa_masyarakat'] ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Kecamatan</label>
					<input type="text" name="kecamatan" class="form-control" value="<?php echo $detail['kecamatan_masyarakat'] ?>">
				</div>
				<div class="mb-3">
					<img src="../assets/files/masyarakat/<?php echo $detail['foto_masyarakat']; ?>" width="100" class="rounded">
					<br>
					<label class="form-label">Ganti Foto</label>
					<input type="file" name="foto" class="form-control">
				</div>
				<div class="mb-3">
					<button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST['ubah'])) {
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

	if (empty($password)) {
		if (empty($filefoto)) {
			$koneksi->query("UPDATE masyarakat SET username_masyarakat='$username',
				nama_masyarakat='$nama',
				jk_masyarakat='$jk',
				telpon_masyarakat='$telpon',
				alamat_masyarakat='$alamat',
				rt_rw_masyarakat='$rt_rw',
				dusun_masyarakat='$dusun',
				desa_masyarakat='$desa',
				kecamatan_masyarakat='$kecamatan'  WHERE id_masyarakat='$id_masyarakat' ");
		}
		else
		{

			move_uploaded_file($filefoto, '../assets/files/masyarakat/'.$namafoto);
			$koneksi->query("UPDATE masyarakat SET username_masyarakat='$username',
				nama_masyarakat='$nama',
				jk_masyarakat='$jk',
				telpon_masyarakat='$telpon',
				alamat_masyarakat='$alamat',
				rt_rw_masyarakat='$rt_rw',
				dusun_masyarakat='$dusun',
				desa_masyarakat='$desa',
				kecamatan_masyarakat='$kecamatan',
				foto_masyarakat='$namafoto'  WHERE id_masyarakat='$id_masyarakat' ");
		}
	}
	else
	{
		if (empty($filefoto)) {
			$koneksi->query("UPDATE masyarakat SET username_masyarakat='$username',
				password_masyarakat='$password',
				nama_masyarakat='$nama',
				jk_masyarakat='$jk',
				telpon_masyarakat='$telpon',
				alamat_masyarakat='$alamat',
				rt_rw_masyarakat='$rt_rw',
				dusun_masyarakat='$dusun',
				desa_masyarakat='$desa',
				kecamatan_masyarakat='$kecamatan'  WHERE id_masyarakat='$id_masyarakat' ");
		}
		else
		{

			move_uploaded_file($filefoto, '../assets/files/masyarakat/'.$namafoto);
			$koneksi->query("UPDATE masyarakat SET username_masyarakat='$username',
				password_masyarakat='$password',
				nama_masyarakat='$nama',
				jk_masyarakat='$jk',
				telpon_masyarakat='$telpon',
				alamat_masyarakat='$alamat',
				rt_rw_masyarakat='$rt_rw',
				dusun_masyarakat='$dusun',
				desa_masyarakat='$desa',
				kecamatan_masyarakat='$kecamatan',
				foto_masyarakat='$namafoto'  WHERE id_masyarakat='$id_masyarakat' ");
		}

	}


	echo "<script>alert('Berhasil Mengubah')</script>";
	echo "<script>location='profil.php'</script>";

	


	
}
?>


<?php include 'footer.php' ?>
