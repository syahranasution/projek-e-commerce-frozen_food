<?php 
session_start();
include 'koneksi.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi_db->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian = '$id_pembelian'");
$detbay = $ambil->fetch_assoc();

//jika blm ada data pembayaran
if(empty($detbay))
{
	echo "<script>alert('belum ada data pembayaran')</script>";
	echo "<script>location='riwayat.php';</script>";
}else if ($_SESSION["customer"]['id_pelanggan'] !== $detbay["id_pelanggan"]) 
{
	//jika data pelanggan yg bayar pembayaran tidak sesuai dengan yang login
	echo "<script>alert('Anda Tidak Berhak Melihat Pembayaran Orang Lain!!')</script>";
	echo "<script>location='riwayat.php';</script>";
}
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.1-web/css/all.min.css">

    <title>Lihat Pembayaran</title>
  </head>
  <body>
    
    <?php include 'menu.php'; ?>
    
    <div class="container">
    	<h3>Lihat Pembayaran</h3>
    	<div class="row">
	 		<div class="col-md-6">
	 			<table class="table table-striped ml-3" style="background-color: var(--primary-color) !important; font-family: Ink Free;">
	 				<tr>
	 					<th>Nama</th>
	 					<td><?php echo $detbay['nama'] ?></td>
	 				</tr><br>
	 				<tr>
	 					<th>Bank</th>
	 					<td><?php echo $detbay['bank'] ?></td>
	 				</tr>
	 				<tr>
	 					<th>Jumlah</th>
	 					<td>Rp.<?php echo number_format($detbay['jumlah'])?></td>
	 				</tr>
	 				<tr>
	 					<th>Tanggal</th>
	 					<td><?php echo $detbay['tanggal'] ?></td>
	 				</tr>
	 				<tr>
	 					<th>Bukti Pembayaran</th>
	 					<td><img class="img-responsive" src="bukti_pembayaran/<?php echo $detbay['bukti'] ?>" alt="" style="width: 130px; height: 120px;"></td>
	 				</tr>
	 				<tr>
	 					<th></th>
	 					<td> <a href="riwayat.php" class="btn btn-secondary" style="color: white; font-family: Ink Free;">Kembali</a></td>
	 				</tr>
				</table>
			 </div>
    	</div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>