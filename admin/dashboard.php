<?php 
$masyarakat = array();
$ambil = $koneksi->query("SELECT * FROM masyarakat");
while($detail = $ambil->fetch_assoc())
{
    $masyarakat[] = $detail;
}
$total_masyarakat = count($masyarakat);
//  count di gunakan untuk menghitung total data


$masuk = array();
$ambil_masuk = $koneksi->query("SELECT * FROM daftar_pengaduan WHERE status_pengaduan = 'diajukan' ");
while($detail_masuk = $ambil_masuk->fetch_assoc())
{
    $masuk[] = $detail_masuk;
}
$total_diajukan = count($masuk);

$selesai = array();
$ambil_selesai = $koneksi->query("SELECT * FROM daftar_pengaduan WHERE status_pengaduan = 'selesai' ");
while($detail_selesai = $ambil_selesai->fetch_assoc())
{
    $selesai[] = $detail_selesai;
}
$total_selesai = count($selesai);
//  mwnampilkan semua data dari tabel daftar aduan yang status pengaduan == proses
$proses = array();
$ambil_proses = $koneksi->query("SELECT * FROM daftar_pengaduan WHERE status_pengaduan = 'diproses' ");
while($detail_proses = $ambil_proses->fetch_assoc())
{
    $proses[] = $detail_proses;
}
$total_proses = count($proses);

$ditolak = array();
$ambil_ditolak = $koneksi->query("SELECT * FROM daftar_pengaduan WHERE status_pengaduan = 'ditolak' ");
while($detail_ditolak = $ambil_ditolak->fetch_assoc())
{
    $ditolak[] = $detail_ditolak;
}
$total_ditolak = count($ditolak);

$admin = array();
$ambil_admin = $koneksi->query("SELECT * FROM admin");
while($detail_admin = $ambil_admin->fetch_assoc())
{
    $admin[] = $detail_admin;
}
$total_admin = count($admin);
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body text-center">Aduan Masuk</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h3 class="text-white fw-bold"><?php echo $total_diajukan; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body text-center">Aduan Di Proses</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h3 class="text-white fw-bold"><?php echo $total_proses; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body text-center">Aduan Di Tolak</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h3 class="text-white fw-bold"><?php echo $total_ditolak; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body text-center">Aduan Di Selesai</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h3 class="text-white fw-bold"><?php echo $total_selesai; ?></h3>
                </div>
            </div>
        </div>



    </div>
    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body text-center">Total Pengguna</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h3 class="text-white fw-bold"><?php echo $total_masyarakat; ?></h3>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body text-center">Total Admin</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h3 class="text-white fw-bold"><?php echo $total_admin; ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1 shadow rounded bg-white p-5 my-5">
            <p>Selamat datang <strong><?php echo $_SESSION['admin']["nama_admin"]; ?></strong></p>
            <strong><i class="bi bi-check tetx-success"></i> Kelola Data Aduan Yang Diproses Melalui Panel Ini</strong>
            <br>
            <strong><i class="bi bi-check tetx-success"></i> Buat laporan melalui panel ini</strong>
        </div>
    </div>

</div>
