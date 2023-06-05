<?php 
$id_masyarakat = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM masyarakat WHERE id_masyarakat='$id_masyarakat'");
$detail = $ambil->fetch_assoc();

 ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 shadow rounded bg-white p-5 my-5">
			<div class="table-responsive">
				<h6>Detail Masyarakat :</h6>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Username</th>
							<th><?php echo $detail['username_masyarakat']; ?></th>
						</tr>
						<tr>
							<th>Nama</th>
							<th><?php echo $detail['nama_masyarakat']; ?></th>
						</tr>
						<tr>
							<th>Jenis kelamin</th>
							<th><?php echo $detail['jk_masyarakat']; ?></th>
						</tr>
						<tr>
							<th>Jenis kelamin</th>
							<th><?php echo $detail['telpon_masyarakat']; ?></th>
						</tr>
						<tr>
							<th>Alamat</th>
							<th><?php echo $detail['alamat_masyarakat']; ?></th>
						</tr>
						<tr>
							<th>Rt/Rw</th>
							<th><?php echo $detail['rt_rw_masyarakat']; ?></th>
						</tr>
						<tr>
							<th>Dusun</th>
							<th><?php echo $detail['dusun_masyarakat']; ?></th>
						</tr>
						<tr>
							<th>Desa</th>
							<th><?php echo $detail['desa_masyarakat']; ?></th>
						</tr>
						<tr>
							<th>Kecamatan</th>
							<th><?php echo $detail['kecamatan_masyarakat']; ?></th>
						</tr>
						<tr>
							<th>Foto</th>
							<th><img src="../assets/files/masyarakat/<?php echo $detail['foto_masyarakat']; ?>" class="rounded" width="100"></th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>