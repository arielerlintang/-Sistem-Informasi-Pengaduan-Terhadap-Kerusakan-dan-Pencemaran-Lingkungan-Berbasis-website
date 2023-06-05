
<?php 
$id_pengaduan = $_GET['id'];
$ambil = $koneksi->query("SELECT *  FROM pengaduan 
	LEFT JOIN terlapor ON terlapor.id_terlapor = pengaduan.id_terlapor
	LEFT JOIN masyarakat ON pengaduan.id_masyarakat = masyarakat.id_masyarakat
	LEFT JOIN daftar_pengaduan ON daftar_pengaduan.id_pengaduan = pengaduan.id_pengaduan
	LEFT JOIN riwayat_pengaduan ON riwayat_pengaduan.id_pengaduan = pengaduan.id_pengaduan
	WHERE  pengaduan.id_pengaduan='$id_pengaduan' ");
$detail = $ambil->fetch_assoc();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 shadow rounded bg-white p-5 my-5">
			<h5 class="fw-bold">Detail Pengaduan</h5>
			<section>
				
				<h6 class="fw-bold">Pelapor :</h6>
				<div class="row">
					<div class="col-md-2">
						<h6>Nama Pelapor</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['nama_masyarakat']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>jenis Kelamin</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['jk_masyarakat']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Telpon</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['telpon_masyarakat']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Alamat Pelapor</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['alamat_masyarakat']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Rt/Rw</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['rt_rw_masyarakat']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Dusun</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['dusun_masyarakat']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Desa</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['desa_masyarakat']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Kecamatan</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['kecamatan_masyarakat']; ?></h6>
					</div>
				</div>

			</section>
			<section>
				<h6 class="fw-bold">Terlapor :</h6>
				<div class="row">
					<div class="col-md-2">
						<h6>Nama Terlapor</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['nama_terlapor']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Alamat Terlapor</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['alamat_masyarakat']; ?></h6>
					</div>
				</div>
			</section>
			<section>
				<h6 class="fw-bold">Pengaduan :</h6>
				<div class="row">
					<div class="col-md-2">
						<h6>Status Pengaduan</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<?php if ($detail['status_pengaduan']=="Diajukan"){ ?>
							<span class="badge bg-info"><?php echo $detail['status_pengaduan']; ?></span>
						<?php } elseif ($detail['status_pengaduan']=="Ditolak") {?>
							<span class="badge bg-danger"><?php echo $detail['status_pengaduan']; ?></span>

						<?php }elseif ($detail['status_pengaduan']=="Diproses") {?>
							<span class="badge bg-warning"><?php echo $detail['status_pengaduan']; ?></span>

						<?php }	else{   ?>
							<span class="badge bg-success"><?php echo $detail['status_pengaduan']; ?></span>

						<?php } ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Kategori</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['kategori_pengaduan']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Lokasi Kejadian</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['lokasi_kejadian']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Tanggal Pengaduan</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['tanggal_pengaduan']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Jenis Lokasi</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['jenis_lokasi']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Uraian Pengaduan</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['uraian_pengaduan']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Dampak Pengaduan</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['dampak_pengaduan']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Rt/Rw Lokasi</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['rt_rw']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Dusun Lokasi</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['dusun']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Desa Lokasi</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['desa']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Foto</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<div>
							<img src="../assets/files/pengaduan/<?php echo $detail['foto_pengaduan']; ?>" width="100" class="rounded">
						</div>
					</div>
				</div>
			</section>
			<section>
				<h6>Pembenahan</h6>
				<div class="row">
					<div class="col-md-2">
						<h6>Solusi</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<h6><?php echo $detail['solusi']; ?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h6>Foto Pembenahan</h6>
					</div>
					<div class="col-md-1">
						<h6>:</h6>
					</div>
					<div class="col-md-3">
						<div>
							<img src="../assets/files/pembenahan/<?php echo $detail['foto_pembenahan']; ?>" width="100" class="rounded">
						</div>
					</div>
				</div>
			</section>
			<a href="laporan.php?id=<?php echo $id_pengaduan; ?>" class="btn btn-primary" target="_blank"><i class="bi bi-printer"></i> Buat Surat Teguran</a>
		</div>
	</div>
</div>
