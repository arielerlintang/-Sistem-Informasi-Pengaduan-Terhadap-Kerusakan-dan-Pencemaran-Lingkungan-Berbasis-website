	<?php 
	$ambil = $koneksi->query("SELECT * FROM identitas WHERE id_identitas = '1' ");
	$desa = $ambil->fetch_assoc();
	
	?>
	<div>
		<img src="assets/files/desa/<?php echo $desa['gambar_desa']; ?>" class="rounded" width="300">
	</div>
	<div class="row">
		<div class="col-md-2 my-2">
			<span>Nama Desa</span> 
		</div>
		<div class="col-md-1 my-2">
			<span>:</span>
		</div>
		<div class="col-md-9 my-2">
			<span><?php echo $desa['nama_desa']; ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 my-2">
			<span>No Telpon</span> 
		</div>
		<div class="col-md-1 my-2">
			<span>:</span>
		</div>
		<div class="col-md-9 my-2">
			<span><?php echo $desa['no_hp']; ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 my-2">
			<span>kode Pos</span> 
		</div>
		<div class="col-md-1 my-2">
			<span>:</span>
		</div>
		<div class="col-md-9 my-2">
			<span><?php echo $desa['kode_pos']; ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 my-2">
			<span>Email</span> 
		</div>
		<div class="col-md-1 my-2">
			<span>:</span>
		</div>
		<div class="col-md-9 my-2">
			<span><?php echo $desa['email']; ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 my-2">
			<span>Alamat</span> 
		</div>
		<div class="col-md-1 my-2">
			<span>:</span>
		</div>
		<div class="col-md-9 my-2">
			<span><?php echo $desa['alamat']; ?></span>
		</div>
	</div>