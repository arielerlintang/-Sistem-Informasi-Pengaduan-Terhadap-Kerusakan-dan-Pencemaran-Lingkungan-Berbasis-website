<?php  include 'header.php' ?>
<?php 

$id_masyarakat = $_SESSION['masyarakat']['id_masyarakat'];
$pengaduan = array();
$ambil = $koneksi->query("SELECT * FROM pengaduan 
	LEFT JOIN daftar_pengaduan ON daftar_pengaduan.id_pengaduan = pengaduan.id_pengaduan 
	LEFT JOIN masyarakat ON masyarakat.id_masyarakat = pengaduan.id_masyarakat 
	LEFT JOIN terlapor ON terlapor.id_terlapor = pengaduan.id_terlapor 
	WHERE pengaduan.id_masyarakat='$id_masyarakat'
	ORDER BY pengaduan.id_pengaduan DESC ");
while($detail = $ambil->fetch_assoc())
{
	$pengaduan[] = $detail;
}


?>
<div class="container">
	<div class="row">
		<div class="col-md-12 shadow rounded bg-white p-5 my-5">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Status</th>
							<th>Nama Terlapor</th>
							<th>Alamat Terlapor</th>
							<th>Kategori</th>
							<th>Tanggal</th>
							<th>Jenis Lokasi</th>
							<th>Rt/Rw</th>
							<th>Dusun</th>
							<th>Desa</th>
							<th>Foto</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pengaduan as $key => $value): ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td>
									<?php if ($value['status_pengaduan']=="Diajukan"){ ?>
										<span class="badge bg-info"><?php echo $value['status_pengaduan']; ?></span>
									<?php } elseif ($value['status_pengaduan']=="Ditolak") {?>
											<span class="badge bg-danger"><?php echo $value['status_pengaduan']; ?></span>

									<?php }elseif ($value['status_pengaduan']=="Diproses") {?>
											<span class="badge bg-warning"><?php echo $value['status_pengaduan']; ?></span>

									<?php }	else{   ?>
											<span class="badge bg-success"><?php echo $value['status_pengaduan']; ?></span>

									<?php } ?>
								</td>
								<td><?php echo ucwords($value['nama_terlapor']); ?></td>
								<td><?php echo ucwords($value['alamat_terlapor']); ?></td>
								<td><?php echo $value['kategori_pengaduan']; ?></td>
								<td><?php echo date("d/m/Y",strtotime($value['tanggal_pengaduan'])); ?></td>
								<td><?php echo $value['jenis_lokasi']; ?></td>
								<td><?php echo $value['rt_rw']; ?></td>
								<td><?php echo $value['dusun']; ?></td>
								<td><?php echo $value['desa']; ?></td>
								<td><img src="../assets/files/pengaduan/<?php echo $value['foto_pengaduan']; ?>" width="100"></td>
								<td>
									<a href="riwayat_detail.php?id=<?php echo $value['id_pengaduan']; ?>" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-search text-white fw-bold"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php  include 'footer.php' ?>