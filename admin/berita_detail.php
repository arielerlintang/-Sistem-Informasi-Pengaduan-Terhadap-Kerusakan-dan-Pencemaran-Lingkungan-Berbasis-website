<?php

$id_berita = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM berita LEFT JOIN admin ON admin.id_admin = berita.id_admin WHERE id_berita = '$id_berita' "); 
$berita =$ambil->fetch_assoc();
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 bg-white card p-5 my-5">
			<div class="">
				<h3 class="fw-bold" style="text-transform: capitalize;"><?php echo $berita["judul_berita"]; ?></h3>
                <div class="mt-2">
                	<div class="text-muted">
                		<i class="bi bi-person-circle"></i>
                		|<span>By - <strong><?php echo $berita["nama_admin"]; ?></strong> - <i class="bi bi-calendar"></i> <strong><?php echo date("d/m/Y H:i", strtotime($berita["tanggal_berita"]))  ?></strong></span>
                	</div>

                </div>
			</div>
			<div class="my-3">
				<img src="../asset/file/<?php echo $berita['foto_berita']; ?>" width="300">
			</div>
			<div>
				<p class=""><?php echo $berita["isi_berita"]; ?></p>
			</div>
		</div>
	</div>
</div>
