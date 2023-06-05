<?php 

$berita = array();
$ambil_berita = $koneksi->query("SELECT * FROM berita LEFT JOIN kategori ON kategori.id_kategori = berita.id_kategori LEFT JOIN admin ON admin.id_admin = berita.id_admin");
while($tiap_berita = $ambil_berita->fetch_assoc())
{
	$berita[] = $tiap_berita;
}
// echo "<pre>";
// print_r ($berita);
// echo "</pre>";

?>
<div class="container">
	<div class="row">
		<div class="col-md-12 shadow p-5 my-5 card">
			<h6>Data Berita</h6>
			<hr>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
					
					<thead>
						<tr>
							<th>No</th>
							<th>Admin</th>
							<th>Kategori</th>
							<th>Judul</th>
							<th>Tanggal</th>
							<th>Foto</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($berita as $key => $value): ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $value["nama_admin"]; ?></td>
								<td><?php echo $value["nama_kategori"]; ?></td>
								<td><?php echo $value["judul_berita"]; ?></td>
								<td><?php echo date("d/m/Y H:i", strtotime($value["tanggal_berita"])); ?></td>
								<td><img src="../assets/files/berita/<?php echo $value["foto_berita"]; ?>" width="100"></td>
								
								<td nowrap="nowrap">
									<a href="index.php?page=berita_detail&id=<?php echo $value['id_berita']; ?>" class="btn btn-outline-info btn-sm"><i class="bi bi-search"></i></a>
									<a href="index.php?page=berita_ubah&id=<?php echo $value['id_berita']; ?>" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-square"></i></a>	
									<a href="index.php?page=berita_hapus&id=<?php echo $value['id_berita']; ?>" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></a>			
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<a href="index.php?page=berita_tambah" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i> Tambah</a>
			</div>
		</div>
	</div>
</div>