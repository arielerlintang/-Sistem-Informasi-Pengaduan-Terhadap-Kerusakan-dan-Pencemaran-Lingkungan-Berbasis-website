	<?php 
	$ambil = $koneksi->query("SELECT * FROM identitas WHERE id_identitas = '1' ");
	$desa = $ambil->fetch_assoc();
	
	 ?>
<div>
	<img src="assets/files/desa/<?php echo $desa['gambar_desa']; ?>" class="rounded" width="300">	
</div>
<div class="row">
	<div class="col-md-2 my-2">
		<span>Visi</span> 
	</div>
	<div class="col-md-1 my-2">
		<span>:</span>
	</div>
	<div class="col-md-9 my-2">
		<span><?php echo $desa['visi']; ?></span>
	</div>
</div>
<div class="row">
	<div class="col-md-2 my-2">
		<span>Misi</span> 
	</div>
	<div class="col-md-1 my-2">
		<span>:</span>
	</div>
	<div class="col-md-9 my-2">
		<span><?php echo $desa['misi']; ?></span>
	</div>
</div>
