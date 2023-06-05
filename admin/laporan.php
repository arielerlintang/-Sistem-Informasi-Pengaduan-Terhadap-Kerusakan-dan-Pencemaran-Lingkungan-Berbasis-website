<?php 
include '../koneksi.php';
$id_pengaduan = $_GET['id'];
$ambil = $koneksi->query("SELECT *  FROM pengaduan 
	LEFT JOIN terlapor ON terlapor.id_terlapor = pengaduan.id_terlapor
	LEFT JOIN masyarakat ON pengaduan.id_masyarakat = masyarakat.id_masyarakat
	LEFT JOIN daftar_pengaduan ON daftar_pengaduan.id_pengaduan = pengaduan.id_pengaduan
	WHERE  pengaduan.id_pengaduan='$id_pengaduan' ");
$detail = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.parent {
			display: grid;
			grid-template-columns: repeat(5, 1fr);
			grid-template-rows: repeat(5, 1fr);
			grid-column-gap: 0px;
			grid-row-gap: 0px;
		}

		.div1 { grid-area: 1 / 5 / 2 / 6; }
		.div2 { grid-area: 3 / 5 / 4 / 6; }

		.container {
			margin-left: -15%; margin-right: -15%;
			display: grid;
			grid-template-columns: 1.1fr 0.2em 1.1fr;
			gap: 0px 0px;
			grid-auto-flow: row;
			grid-template-areas:
			"satu . dua";
			margin-bottom: 50px;
		}

		.satu { grid-area: satu; }

		.dua { grid-area: dua; }

		.container1 {  
			display: grid;
			margin-left: -500%; margin-right: -500%;
			grid-template-columns: 1.1fr 0.3em 1fr;
			gap: 0px 0px;
			grid-auto-flow: row;
			grid-template-areas:
			". . tanggal";
		}

		.tanggal { grid-area: tanggal; }

		.container2 {
			margin-top: 20px;  
			margin-bottom: 20px;  
			display: grid;
			grid-template-columns: 1.1fr 0.3em 1fr;
			
			gap: 0px 0px;
			grid-auto-flow: row;
			grid-template-areas:
			". . kepada"


		}

		.kepada { grid-area: kepada; }

		.container3
		{
			display: grid;
			grid-template-columns: 1fr 1fr 1fr;
			gap: 0px 0px;
			grid-auto-flow: row;
			grid-template-areas:
			"garis garis garis";
			margin-left: -15%; margin-right: -15%;
		}

		.garis { grid-area: garis; }
		.container4 {  display: grid;
			grid-template-columns: 0.9fr 1.1fr 1fr;
			margin-left: -10%; margin-right: -10%;	
			gap: 10px 10px;
			grid-auto-flow: row;
			grid-template-areas:
			"logo pengantar pengantar";
		}

		.logo { grid-area: logo; }

		.pengantar { grid-area: pengantar; }

	</style>
	
</head>
<body style="margin-left: 15%; margin-right: 15%; 
font-family: Times New Roman; padding-top: 20px;">

<div class="container4">
	<div class="logo">
		<img src="../assets/files/desa/Lambang_Kab_Indragiri_Hulu.PNG" width="180" height="170">
	</div>
	<div class="pengantar">
		<h1 style="font-family: Cambria; font-size: 2em; margin-top: 20px;">PEMERINTAH DESA KUANTAN BABU</h1>
		<h1 style="font-family: Cambria; font-size: 2.5em; margin-top: -20px;">DINAS LINGKUNGAN HIDUP</h1>
		<h6 style="font-family: Cambria; font-size:1em; margin-top: -20px;">Alamat : Kantor Otonom. Hangtuah No.16, Rantau Mapesai, Kec. Rengat, Kabupaten Indragiri Hulu, Riau 29314</h6>
	</div>
</div>	

<div class="container3">
	<div class="garis">
		<hr style="border: 0.5px solid black;">
		<hr style="border: 2px solid black;">
	</div>
</div>

<div class="container1">
	<div class="tanggal">
		<p style="font-weight: 600; text-align: left;">Kuantan Babu Rengat, <?php echo date("d"); ?> <?php echo date("M"); ?> <?php echo date("Y"); ?> </p>
	</div>
</div>


<div class="container2">
	<div class="kepada">
		<span style="font-weight:600;">Kepada</span>
	</div>
</div>

<div class="container">
	<div class="satu">
		<table style="text-align :left;">
			<thead>
				<tr>
					<th>Nomor</th>
					<th>:</th>
					<th>660.1 /     / DLH-SMI / <?php date("Y"); ?></th>

				</tr>
				<tr>
					<th>Lampiran</th>
					<th>:</th>
					<th>-</th>

				</tr>
				<tr>
					<th>Perihal</th>
					<th>:</th>
					<th>Surat Teguran </th>

				</tr>
			</thead>
		</table>
	</div>
	<div class="dua">
		<table style="text-align :left;">
			<thead>
				<tr>
					<th>Yth :</th>
					<th>:</th>
					<th><?php echo ucwords($detail['nama_terlapor']); ?></th>

				</tr>
				<tr>
					<th></th>
					<th><br></th>
					<th></th>
				</tr>
				<tr>
					<th></th>
					<th></th>
					<th>Di Tempat</th>
				</tr>
			</thead>
		</table>
	</div>
</div>


<p style="text-indent: 30px; font-size: 25px;">Menindaklanjuti surat pengaduan dari masyarakat dan hasil verifikasi lapangan terkait adanya pelanggaran lingkungan yang disebabkan oleh aktivitas <?php echo $detail['uraian_pengaduan'] ?> yang berdampak <?php echo $detail['dampak_pengaduan'] ?></p>

<p style="text-indent: 30px; font-size: 25px;">Dengan diterbitkannya surat teguran ini diharapkan Saudara yang bersangkutan dalam menjalankan tugasnya agar dapat memperhatikan bertanggung jawab akan dampak-dampak yang ditimbulkan.</p>

<p style="text-indent: 30px; font-size: 25px;">Sebagai bahan pendukung dalam melihat persoalan ini kami lampirkan hasil verifikasi lapangan dan surat masyarakat yang terkena dampak langsung.</p>


<p style="text-indent: 30px; font-size: 25px;">Demikian untuk menjadi perhatian, dan atas kerjasamanya disampaikan terima kasih.</p>

<div class="parent">
	<div class="div1" style="text-align: center;">Kepala Dinas Lingkungan Hidup
		Kecamatan Rengat
	</div>
	<div class="div2">.........................................
		NIP
	</div>
</div>




<script type="text/javascript">print()</script>
</body>
</html>