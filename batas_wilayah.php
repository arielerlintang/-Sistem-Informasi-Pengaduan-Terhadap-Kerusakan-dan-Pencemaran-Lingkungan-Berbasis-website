	<?php 
	$ambil = $koneksi->query("SELECT * FROM identitas WHERE id_identitas = '1' ");
	$desa = $ambil->fetch_assoc();
	
	 ?>
<div>
	<img src="assets/files/desa/<?php echo $desa['gambar_desa']; ?>" class="rounded" width="300">	
</div>
<div class="row">
	<div class="col-md-2 my-2">
		<span>Batas Utara</span> 
	</div>
	<div class="col-md-1 my-2">
		<span>:</span>
	</div>
	<div class="col-md-9 my-2">
		<span><?php echo $desa['batas_utara']; ?></span>
	</div>
</div>
<div class="row">
	<div class="col-md-2 my-2">
		<span>Batas Selatan</span> 
	</div>
	<div class="col-md-1 my-2">
		<span>:</span>
	</div>
	<div class="col-md-9 my-2">
		<span><?php echo $desa['batas_selatan']; ?></span>
	</div>
</div>
<div class="row">
	<div class="col-md-2 my-2">
		<span>Batas Barat</span> 
	</div>
	<div class="col-md-1 my-2">
		<span>:</span>
	</div>
	<div class="col-md-9 my-2">
		<span><?php echo $desa['batas_barat']; ?></span>
	</div>
</div>
<div class="row">
	<div class="col-md-2 my-2">
		<span>Batas Timur</span> 
	</div>
	<div class="col-md-1 my-2">
		<span>:</span>
	</div>
	<div class="col-md-9 my-2">
		<span><?php echo $desa['batas_timur']; ?></span>
	</div>
</div>
