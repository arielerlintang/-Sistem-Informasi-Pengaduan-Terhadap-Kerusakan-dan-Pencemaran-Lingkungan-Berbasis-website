<div class="container">
	<?php 
	$ambil = $koneksi->query("SELECT * FROM identitas WHERE id_identitas = '1' ");
	$desa = $ambil->fetch_assoc();
	
	?>
	<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
	<div class="row">
		<div class="col-md-10 offset-md-1 shadow rounded bg-white p-5 my-5">
			<h6>Identitas Desa</h6>
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label>Nama Desa</label>
					<input type="text" name="nama_desa" class="form-control" value="<?php echo $desa['nama_desa']; ?>">
				</div>
				<div class="mb-3">
					<label>No Hp</label>
					<input type="text" name="no_hp" class="form-control" value="<?php echo $desa['no_hp'] ?>">
				</div>
				<div class="mb-3">
					<label>Kode Pos</label>
					<input type="number" name="kode_pos" maxlength="15" class="form-control" value="<?php echo $desa['kode_pos'] ?>">
				</div>
				<div class="mb-3">
					<label>Email</label>
					<input type="email" name="email" class="form-control" value="<?php echo $desa['email'] ?>">
				</div>
				<div class="mb-3">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat"><?php echo $desa['alamat']; ?></textarea>
				</div>
				<div class="mb-3">
					<label>Visi</label>
					<textarea class="form-control" name="visi"><?php echo $desa['visi'] ?></textarea>
				</div>
				<div class="mb-3">
					<label>Misi</label>
					<textarea class="form-control" name="misi"><?php echo $desa['misi'] ?></textarea>
				</div>
				<div class="mb-3">
					<label>Batas Utara</label>
					<textarea class="form-control" name="batas_utara"><?php echo $desa['batas_utara'] ?></textarea>
				</div>
				<div class="mb-3">
					<label>Batas Selatan</label>
					<textarea class="form-control" name="batas_selatan"><?php echo $desa['batas_selatan'] ?></textarea>
				</div>
				<div class="mb-3">
					<label>Batas Timur</label>
					<textarea class="form-control" name="batas_timur"><?php echo $desa["batas_timur"] ?></textarea>
				</div>
				<div class="mb-3">
					<label>Batas Barat</label>
					<textarea class="form-control" name="batas_barat"><?php echo $desa["batas_barat"] ?></textarea>
				</div>
				<div class="mb-3">
					<label>Sejarah Desa</label>
					<textarea id="editor1" class="form-control" name="sejarah_desa"><?php echo $desa['sejarah_desa']; ?></textarea>
				</div>
				<div class="mb-3">
					<label>Logo</label>
					<br>
					<img src="../assets/files/desa/<?php echo $desa['gambar_desa'] ?>" width="200" class="rounded">
					<br>
					<label>Ganti Foto</label>
					<input type="file" name="gambar_desa" class="form-control">
				</div>
				<button class="btn btn-primary" name="ubah" type="submit">Ubah</button>
			</form>

		</div>
	</div>
</div>
<script>
	ClassicEditor
	.create( document.querySelector( '#editor1' ) )
	.then( editor => {
		console.log( editor );
	} )
	.catch( error => {
		console.error( error );
	} );
</script>
<?php 
if (isset($_POST['ubah']))
{
	$nama_desa = $_POST['nama_desa'];
	$no_hp = $_POST['no_hp'];
	$kode_pos = $_POST['kode_pos'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$visi = $_POST['visi'];
	$misi = $_POST['misi'];
	$batas_utara = $_POST['batas_utara'];
	$batas_selatan = $_POST['batas_selatan'];
	$batas_timur = $_POST['batas_timur'];
	$batas_barat = $_POST['batas_barat'];
	$sejarah_desa = $_POST['sejarah_desa'];

	$namafoto = $_FILES['gambar_desa']['name'];	
	$filefoto = $_FILES['gambar_desa']['tmp_name'];	

	if (empty($filefoto)) {
		
		$koneksi->query("UPDATE identitas SET nama_desa = '$nama_desa',
			no_hp = '$no_hp',
			kode_pos = '$kode_pos',
			email = '$email',
			alamat = '$alamat',
			visi = '$visi',
			misi = '$misi',
			batas_utara = '$batas_utara',
			batas_selatan = '$batas_selatan',
			batas_timur = '$batas_timur',
			batas_barat = '$batas_barat',
			sejarah_desa = '$sejarah_desa' WHERE id_identitas = '1' ");	
	}
	else
	{
		move_uploaded_file($filefoto, "../assets/files/desa/".$namafoto);

		
		$koneksi->query("UPDATE identitas SET nama_desa = '$nama_desa',
			no_hp = '$no_hp',
			kode_pos = '$kode_pos',
			email = '$email',
			alamat = '$alamat',
			visi = '$visi',
			misi = '$misi',
			batas_utara = '$batas_utara',
			batas_selatan = '$batas_selatan',
			batas_timur = '$batas_timur',
			batas_barat = '$batas_barat',
			sejarah_desa = '$sejarah_desa',
			gambar_desa = '$namafoto' WHERE id_identitas = '1' ");	
	}

	

	// echo "<script>alert('Data identitas Di ubah')</script>";
	// echo "<script>location='index.php?page=desa'</script>";
}

?>