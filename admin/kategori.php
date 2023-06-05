<?php 
$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while($detail = $ambil->fetch_assoc())
{
	$kategori[] = $detail;
}

 ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 shadow card p-5 my-5">
			<h6>Data Kategori</h6>
			<hr>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($kategori as $key => $value): ?>
							
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo ucfirst($value["nama_kategori"]); ?></td>
							<td nowrap="nowrap">
								<a href="index.php?page=kategori_ubah&id=<?php echo $value['id_kategori']; ?>" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
								<a href="index.php?page=kategori_hapus&id=<?php echo $value['id_kategori']; ?>" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></a>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<a href="index.php?page=kategori_tambah" class="btn btn-outline-primary"><i class="bi bi-plus-circle" onclick="return confirm('Hapus Kategori ?')"></i> Tambah</a>
			</div>
		</div>
	</div>
</div>