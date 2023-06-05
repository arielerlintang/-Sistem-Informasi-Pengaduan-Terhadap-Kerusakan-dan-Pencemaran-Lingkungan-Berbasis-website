<?php include 'header.php' ?>

<div class="container py-5">
	<div class="row">
		<div class="col-md-3 offset-md-1">
			<h3 class="text-danger"><strong>Profil</strong></h3>

			<div class="accordion" id="accordionPanelsStayOpenExample">
				<div class="accordion-item">
					<h2 class="accordion-header">
						<button class="accordion-button bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
							<strong>Tentang</strong>
						</button>
					</h2>
					<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
						<div class="accordion-body">
							
							<ul class="navbar-nav mx-auto">
								<li class="nav-item"><a class="nav-link" href="identitas.php?page=profil"><strong>Profil desa</strong></a></li>
								<li class="nav-item"><a class="nav-link" href="identitas.php?page=sejarah"><strong>Sejarah desa</strong></a></li>
								<li class="nav-item"><a class="nav-link" href="identitas.php?page=batas_wilayah"><strong>Batas Wilayah Desa</strong></a></li>
								<li class="nav-item"><a class="nav-link" href="identitas.php?page=visi_misi"><strong>Visi Dan Misi Desa</strong></a></li>
							</ul>

						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="col-md-8">
			<br>
			<br>
			<h3 class="text-danger"><strong>Profil</strong></h3>

			<?php 
			if (!isset($_GET['page'])) {

				include 'profil.php';
			}
			elseif($_GET['page']=="sejarah") {
				
				include 'sejarah.php';
			}
			elseif($_GET['page']=="batas_wilayah") {
				
				include 'batas_wilayah.php';
			}
			elseif($_GET['page']=="profil") {
				
				include 'profil.php';
			}
			elseif($_GET['page']=="visi_misi") {
				
				include 'visi_misi.php';
			}
			 ?>
			
		</div>
	</div>
</div>

<?php include 'footer.php' ?>