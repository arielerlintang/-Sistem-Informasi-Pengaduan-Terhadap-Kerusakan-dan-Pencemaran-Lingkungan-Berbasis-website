D<?php 
$masyarakat = array();
$ambil = $koneksi->query("SELECT * FROM masyarakat");
while($detail = $ambil->fetch_assoc())
{
	$masyarakat[] = $detail;
}

 ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 shadow card p-5 my-5">
			<h6>Data masyarakat</h6>
			<hr>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Nama</th>
							<th>Jenis kelamin</th>
							<th>Telpon</th>
							<th>Alamat</th>
							<th>Foto</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($masyarakat as $key => $value): ?>
							
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["username_masyarakat"]; ?></td>
							<td><?php echo $value["nama_masyarakat"]; ?></td>
							<td><?php echo $value["jk_masyarakat"]; ?></td>
							<td><?php echo $value["telpon_masyarakat"]; ?></td>
							<td><?php echo $value["alamat_masyarakat"]; ?></td>
							<td><img src="../assets/files/masyarakat/<?php echo $value["foto_masyarakat"]; ?>" width="100"></td>
							<td nowrap="nowrap">
								<a href="index.php?page=masyarakat_detail&id=<?php echo $value['id_masyarakat']; ?>" class="btn btn-outline-info btn-sm"><i class="bi bi-search"></i></a>
								
								<a href="index.php?page=masyarakat_hapus&id=<?php echo $value['id_masyarakat']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus ?')"><i class="bi bi-trash"></i></a>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>