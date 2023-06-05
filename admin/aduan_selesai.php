<?php 
$pengaduan = array();
$ambil = $koneksi->query("SELECT * FROM pengaduan LEFT JOIN daftar_pengaduan ON daftar_pengaduan.id_pengaduan = pengaduan.id_pengaduan LEFT JOIN masyarakat ON masyarakat.id_masyarakat = pengaduan.id_masyarakat LEFT JOIN terlapor ON terlapor.id_terlapor = pengaduan.id_terlapor WHERE status_pengaduan='Selesai'");
while($detail = $ambil->fetch_assoc())
{
	$pengaduan[] = $detail;
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-12 shadow rounded bg-white p-5 my-5">
			<h6>Aduan Selesai</h6>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Masyarakat</th>
							<th>Terlapor</th>
							<th>Kategori</th>
							<th>Tanggal</th>
							<th>Jenis Lokasi</th>
							<th>Uraian</th>
							<th>Dampak</th>
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
								<td><?php echo $value['nama_masyarakat']; ?></td>
								<td><?php echo $value['nama_terlapor']; ?></td>
								<td><?php echo $value['kategori_pengaduan']; ?></td>
								<td><?php echo date("d/m/Y",strtotime($value['tanggal_pengaduan'])); ?></td>
								<td><?php echo $value['jenis_lokasi']; ?></td>
								<td><?php echo $value['uraian_pengaduan']; ?></td>
								<td><?php echo $value['dampak_pengaduan']; ?></td>
								<td><?php echo $value['rt_rw']; ?></td>
								<td><?php echo $value['dusun']; ?></td>
								<td><?php echo $value['desa']; ?></td>
								<td><img src="../assets/files/pengaduan/<?php echo $value['foto_pengaduan']; ?>" width="100"></td>
								<td>
									<a href="index.php?page=aduan_selesai_detail&id=<?php echo $value['id_pengaduan']; ?>" class="btn btn-info btn-sm shadow-sm"><i class="bi bi-pencil-square"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>