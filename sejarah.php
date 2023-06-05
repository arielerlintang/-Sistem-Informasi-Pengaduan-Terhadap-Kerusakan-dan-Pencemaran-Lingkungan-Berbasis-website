	<?php 
	$ambil = $koneksi->query("SELECT * FROM identitas WHERE id_identitas = '1' ");
	$desa = $ambil->fetch_assoc();
	
	?>

	<div class="row">
		<div>
			<img src="assets/files/desa/<?php echo $desa['gambar_desa']; ?>" class="rounded" width="300">
		</div>
		<div class="col-md-2">
			Sejarah
		</div>
		<div class="col-md-1">
			:
		</div>
		<div class="col-md-8">
			<?php echo $desa['sejarah_desa']; ?>
		</div>
	</div>