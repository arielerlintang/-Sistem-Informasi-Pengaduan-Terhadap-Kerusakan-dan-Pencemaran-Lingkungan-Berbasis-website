
<?php include 'header.php' ?>


<div class="container my-5">
	<div class="row">
		<h6>Buat Pengaduan</h6>
		<div class="col-md-8 offset-md-2 shadow bg-white rounded p-5">
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Nama Terlapor</label>
					<input type="text" name="nama_terlapor" class="form-control" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Alamat Terlapor</label>
					<textarea name="alamat_terlapor" class="form-control" required></textarea>
				</div>
				<div class="mb-3">
					<label class="form-label">Kategori</label>
					<select name="kategori_pengaduan" class="form-control">
						<option class="text-muted">pilih kategori</option>
						<option value="Kerusakan Lingkungan">Kerusakan Lingkungan</option>
						<option value="Pencemaran Lingkungan">Pencemaran Lingkungan</option>
					</select>
				</div>
				
				<div class="mb-3">
					<label class="form-label">Jenis Lokasi</label>
					<select name="jenis_lokasi" class="form-control" required>
						<option class="text-muted">pilih jenis lokasi</option>
						<option value="Pemukiman Masyarakat">Pemukiman Masyarakat</option>
						<option value="Kawasan Hutan">Kawasan Hutan</option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Uraian</label>
					<textarea name="uraian_pengaduan" class="form-control" required></textarea>
				</div>
				<div class="mb-3">
					<label class="form-label">Dampak</label>
					<textarea name="dampak_pengaduan" class="form-control" required></textarea>
				</div>
				<br>
				<h6>Lokasi Perusakan</h6>
				<div class="mb-3">
					<label class="form-label">Detail Lokasi</label>
					<textarea name="lokasi_kejadian" class="form-control" required></textarea>
				</div>
				<div class="mb-3">
					<label class="form-label">Rt/Rw Lokasi</label>
					<input type="text" name="rt_rw" class="form-control" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Dusun Lokasi</label>
					<input type="text" name="dusun" class="form-control" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Desa Lokasi</label>
					<input type="text" name="desa" class="form-control" required>
				</div>
				
				<div class="mb-3">
					<label class="form-label">Bukti Kerusakan</label>
					<input type="file" name="foto" class="form-control" required>
				</div>
				<div class="mb-3">
					<button type="submit" name="simpan" class="btn btn-primary"><i class="bi bi-file-earmark"></i> Buat Laporan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST['simpan'])) {
	$id_masyarakat = $_SESSION['masyarakat']['id_masyarakat'];
	$nama_terlapor = $_POST['nama_terlapor'];
	$alamat_terlapor = $_POST['alamat_terlapor'];
	$kategori_pengaduan = $_POST['kategori_pengaduan'];
	$lokasi_kejadian = $_POST['lokasi_kejadian'];
	$tanggal_pengaduan = date("Y-m-d");
	$jenis_lokasi = $_POST['jenis_lokasi'];
	
	$uraian_pengaduan = $_POST['uraian_pengaduan'];
	$dampak_pengaduan = $_POST['dampak_pengaduan'];

	$rt_rw = $_POST['rt_rw'];
	$dusun = $_POST['dusun'];
	$desa = $_POST['desa'];

	$namafoto = $_FILES['foto']['name'];
	$filefoto = $_FILES['foto']['tmp_name'];
	
	move_uploaded_file($filefoto, '../assets/files/pengaduan/'.$namafoto);

	$koneksi->query("INSERT INTO terlapor (nama_terlapor,alamat_terlapor) VALUES('$nama_terlapor','$alamat_terlapor')");

	$id_terlapor = $koneksi->insert_id;

	$koneksi->query("INSERT INTO pengaduan (id_masyarakat,id_terlapor,kategori_pengaduan,lokasi_kejadian,tanggal_pengaduan,jenis_lokasi,uraian_pengaduan,dampak_pengaduan,rt_rw,dusun,desa,foto_pengaduan) VALUES('$id_masyarakat','$id_terlapor','$kategori_pengaduan','$lokasi_kejadian','$tanggal_pengaduan','$jenis_lokasi','$uraian_pengaduan','$dampak_pengaduan','$rt_rw','$dusun','$desa','$namafoto')");

	$id_pengaduan = $koneksi->insert_id;

	$koneksi->query("INSERT INTO daftar_pengaduan(id_pengaduan,tanggal_pengaduan,uraian_pengaduan,lokasi_kejadian,catatan,status_pengaduan) VALUES('$id_pengaduan','$tanggal_pengaduan','$uraian_pengaduan','$lokasi_kejadian','','Diajukan')");

	echo "<script>alert('Laporan Pengaduan Terkirim')</script>";
	echo "<script>location='riwayat.php'</script>";




	
}
?>


<?php include 'footer.php' ?>
