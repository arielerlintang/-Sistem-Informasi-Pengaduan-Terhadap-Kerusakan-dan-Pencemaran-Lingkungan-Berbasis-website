<?php
$id_berita = $_GET["id"];

$ambil_berita = $koneksi->query("SELECT * FROM berita WHERE id_berita = '$id_berita' ");
$berita = $ambil_berita->fetch_assoc();



$kategori = array();
$ambil_kategori = $koneksi->query("SELECT * FROM kategori"); 
while($tiap_kategori = $ambil_kategori->fetch_assoc())
{
	$kategori[] = $tiap_kategori;
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 sahdow card p-5 my-5">
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label>Kategori</label>

					<select name="id_kategori" class="form-control">
						<option value="" class="text-muted">pilih kategori</option>
						<?php foreach ($kategori as $key => $value): ?>

							<option value="<?php echo $value['id_kategori'] ?>"		<?php 
							if ($berita["id_kategori"]==$value["id_kategori"]) {
								echo "selected";
							}
							 ?>><?php echo $value["nama_kategori"] ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="mb-3">
					<label>Judul</label>
					<input type="text" name="judul_berita" class="form-control" value="<?php echo $berita['judul_berita']; ?>">
				</div>

				<div class="mb-3">
					<label>Isi</label>
					<textarea class="form-control" name="isi_berita"><?php echo $berita["isi_berita"]; ?></textarea>
				</div>
				<div class="mb-3">
					<label>Tanggal</label>
					<input type="datetime-local" name="tanggal_berita" class="form-control" value="<?php echo $berita['tanggal_berita']; ?>">
				</div>
				<div class="mb-3">
				<label>Foto Lama</label>
				<br>
				<img src="../assets/files/berita/<?php echo $berita['foto_berita']; ?>" width="100">	
				</div>
				<div class="mb-3">
					<label>Ganti Foto</label>
					<input type="file" name="foto_berita" class="form-control">
				</div>
				<button type="submit" name="simpan" class="btn btn-primary">Ubah</button>
			</form>
		</div>
	</div>

</div>
<?php 
if (isset($_POST["simpan"])) {

	$id_kategori = $_POST["id_kategori"];
	$judul_berita = $_POST["judul_berita"];
	$isi_berita = $_POST["isi_berita"];
	$tanggal_berita = $_POST["tanggal_berita"];

	$namafoto = $_FILES["foto_berita"]["name"];
	$filefoto = $_FILES["foto_berita"]["tmp_name"];

	$waktu = date("YmdHis");
	$waktu_upload = $waktu.$namafoto;

	if (empty($filefoto)) {
		$koneksi->query("UPDATE berita SET id_kategori = '$id_kategori',
		judul_berita = '$judul_berita',
		isi_berita = '$isi_berita',
		tanggal_berita = '$tanggal_berita' WHERE id_berita = '$id_berita' ");
	}
	else
	{
			$koneksi->query("UPDATE berita SET id_kategori = '$id_kategori',
		judul_berita = '$judul_berita',
		isi_berita = '$isi_berita',
		tanggal_berita = '$tanggal_berita',
		foto_berita = '$waktu_upload' WHERE id_berita = '$id_berita' ");

			move_uploaded_file($filefoto, "../assets/files/berita/$waktu_upload");
	}

	

	echo "<script>alert('Data Di ubah')</script>";
	echo "<script>location='index.php?page=berita'</script>";



}


 ?>