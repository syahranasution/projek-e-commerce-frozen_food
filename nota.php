<?php 
session_start();
include 'koneksi.php';
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.1-web/css/all.min.css">

    <title>Invoice</title>
  </head>
  <body>
    <?php include 'menu.php'; ?>

   <section class="konten">
      <div class="container">
        
         <p><b style="font-family: Comic Sans MS; color: #708090;"><center><h3>"Invoice"</h3></center></b></p>
        <!-- nota ini dikopas dari admin  -->

      <?php
      $ambil = $koneksi_db->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
      $detail = $ambil->fetch_assoc();
      ?>

      <?php 

      //mendapatkan id_pelanggan yg beli
      $idpelangganyangbeli = $detail["id_pelanggan"];

      //mendapatkan id_pelanggan yg login
      $idpelangganyanglogin = $_SESSION["customer"]["id_pelanggan"];

      if ($idpelangganyangbeli!==$idpelangganyanglogin) 
      {
        echo "<script>alert('jangan nakal');</script>";
        echo "<script>location='riwayat.php';</script>";
        exit();
      }

       ?>

      <div class="row text-center" style="color: #708090; font-family: Comic Sans MS;">
        <div class="col-md-4">
          <h3><b>Pembelian :<hr class="col-md-4"></b></h3>
          <strong>No. Pembelian : <?php echo $detail['id_pembelian'] ?></strong><br>
          Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
          Total : Rp. <?php echo number_format($detail['total_pembelian']) ?>
        </div>
        <div class="col-md-4">
          <h3><b>Customer :<hr class="col-md-4"></b></h3>
          <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
           <p>
            <?php echo $detail['telpon_pelanggan']; ?><br>
            <?php echo $detail['email_pelanggan']; ?>
          </p>
        </div>
        <div class="col-md-4">
          <h3><b>Pengiriman :</b><hr class="col-md-4"></h3>
          <strong><?php echo $detail['nama_kota']  ?></strong><br>
          Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?><br>
          Alamat : <?php echo $detail['alamat_pengiriman'] ?>
        </div>
      </div>

      <table class="table table-striped mt-2" style="background-color:#87CEEB; font-family: Comic Sans MS;">
        <thead>
          <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor=1; ?>
          <?php $ambil=$koneksi_db->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
          <?php while($pecah=$ambil->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
          </tr>
          <?php $nomor++; ?>
          <?php } ?>
        
        </tbody>
      </table>


      <div class="row" style="font-family: Comic Sans MS;">
        <div class="col-md-7">
          <div class="alert alert-info">
            <h5>Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?></h5>
            <p>
              <b>No. Rekening : 126 0857 1431 8028</b><br>
              <a href="riwayat.php">>>Konfirmasi Pembayaran</a>
            </p>
          </div>
        </div>
      </div>
      <a href="index.php" class="btn btn-secondary" style="color: white; font-family: Comic Sans MS;">Lanjutkan Belanja</a>

      </div>    
    </section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>


