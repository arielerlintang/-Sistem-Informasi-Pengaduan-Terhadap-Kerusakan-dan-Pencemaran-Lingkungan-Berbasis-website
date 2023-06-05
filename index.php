<?php include 'header.php' ?>

<section class="px-3 bg-danger">
	<div class="">
		<div id="carouselExample" class="carousel slide">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="https://img.lovepik.com/background/20211021/medium/lovepik-country-road-background-image_401613011.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoy3P9htZh7vjzdVL2Hn16kgIyq3S_jDlf4KeyJXHzqoJuGpuhpM4vvn8vkUMPONs9jbE&usqp=CAU" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoy3P9htZh7vjzdVL2Hn16kgIyq3S_jDlf4KeyJXHzqoJuGpuhpM4vvn8vkUMPONs9jbE&usqp=CAU" class="d-block w-100" class="d-block w-100" alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>
</section>

</section>

<section class="">
	<div class="bg-danger py-3">
		<a href="" class="text-decoration-none text-white text-center"><h6>Berita 
		</h6></a>
	</div>
	<div class="container py-5">
		<div class="row">
			<?php 

			$berita = array();
			$ambil_berita = $koneksi->query("SELECT * FROM berita LEFT JOIN kategori ON kategori.id_kategori = berita.id_kategori LEFT JOIN admin ON admin.id_admin = berita.id_admin LIMIT 3");
			while($tiap_berita = $ambil_berita->fetch_assoc())
			{
				$berita[] = $tiap_berita;
			}
// echo "<pre>";
// print_r ($berita);
// echo "</pre>";

			?>

			<?php foreach ($berita as $key => $value): ?>
				<div class="col-md-4">
					<div class="card mb-3 shadow">
						<img src="assets/files/berita/<?php echo $value['foto_berita'] ?>" class="card-img-top" alt="..." width="400">
						<div class="card-body">
							<h5 class="card-title fw-bold"><?php echo $value["judul_berita"] ?></h5>
							<p class="card-text"></p>
							<p class="card-text"><span class="bi bi-person-circle fw-bold text-muted">By :<?php echo $value['nama_admin']; ?></span><small class="text-muted"> | <i class="bi bi-calendar"></i></small> <?php echo date("d/m/Y H:i",strtotime($value["tanggal_berita"])) ?></p>
							
							<p class="card-text"><?php echo substr(strip_tags($value["isi_berita"]), 0,100) ?></p> 
							<a class="btn btn-outline-primary  rounded-pill" href="berita_detail.php?id=<?php echo $value["id_berita"] ?>"><i class="bi bi-chevron-double-right"></i> SELENGKAPNYA</a>
						</div>
					</div>
				</div>
			<?php endforeach ?>

		</div>

	</div>

</section>
<?php include 'footer.php' ?>