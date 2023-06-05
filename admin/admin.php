<?php

$admin = array();
$ambil = $koneksi->query("SELECT * FROM admin"); 
while($tiap = $ambil->fetch_assoc())
{
	$admin[] = $tiap;
}

// echo "<pre>";
// print_r ($admin);
// echo "</pre>";

?>
<div class="container">
	<div class="row">
		<div class="col-md-11 mx-auto offset-md-1 p-5 my-5 shadow rounded bg-white">
			<h6>Data User : </h6>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>Telpon</th>
							<th>Alamat</th>
							<th>Foto</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($admin as $key => $value): ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $value["username_admin"] ?></td>
								<td><?php echo $value["nama_admin"] ?></td>
								<td><?php echo $value["jk_admin"] ?></td>
								<td><?php echo $value["telpon_admin"] ?></td>
								<td><?php echo $value["alamat_admin"] ?></td>
								<td><img src="../assets/files/admin/<?php echo $value["foto_admin"] ?>" width="100" class="rounded"></td>
								
								<td nowrap="nowrap">
									<a href="admin_hapus.php?id=<?php echo $value['id_admin']; ?>" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></a>
								</td>
							</tr>
							
						<?php endforeach ?>
					</tbody>
				</table>
				<a href="index.php?page=admin_tambah" class="btn btn-primary">Tambah</a>
			</div>
			
		</div>
	</div>
</div>
