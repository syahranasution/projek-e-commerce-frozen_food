<?php 
session_start();
include 'koneksi.php';

if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) 
{
  echo "<script>alert('keranjang Anda Kosong, Silahkan Belanja Dulu!');</script>"
    ;
    echo "<script>location='shop.php';</script>";
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
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.1-web/css/all.min.css">

    <title>Keranjang</title>
  </head>
  <body>
    <?php include 'menu.php'; ?>

    <p><b style="font-family:Comic Sans MS; color: var(--primary-color) !important;"><center><h3>Keranjang Belanja <i class="fas fa-cart-plus"></i></h3></center></b></p>


  <div class="col-md-10 p-5 pt-2">
    <h3 style="color: var(--primary-color) !important; font-family:Comic Sans MS;"><i class="fas fa-cart-plus"></i> <b>Data Perbelanjaan</b></h3><hr>
       <table class="table table-striped" style="background-color: var(--primary-color) !important; font-family: Comic Sans MS;">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Foto Produk</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">SubHarga</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
          <tbody>
            <?php $nomor=1; ?>
            <?php $totalbelanja  = 0; ?>
            <?php foreach($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
            <?php
             $ambil = $koneksi_db->query("SELECT * FROM tbl_produk WHERE id_produk='$id_produk'");
             $pecah = $ambil->fetch_assoc();
             $subharga = $pecah["harga_produk"]*$jumlah;
             ?>

             <tr>
              <th scope="row"><?php echo $nomor; ?></th>
                <td><img height="60px" width="100px" src="img/<?php echo $pecah["foto_produk"] ?>" alt="<?php echo $pecah["foto_produk"] ?>"></td>
                <td><?php echo $pecah['nama_produk']; ?></td>
                <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                <td><?php echo $jumlah; ?></td>
                <td>Rp. <?php echo number_format($subharga); ?></td>
                <td>
                  <a href="hapus_keranjang.php?id=<?php echo $id_produk ?>" class="btn btn-secondary btn-xs">Hapus</a>
                </td>
              </tr>

             <?php $nomor++; ?>
             <?php endforeach ?>

          </tbody>
      </table>

      <a href="shop.php" class="btn btn-secondary" style="color: white; font-family: Comic Sans MS;">Lanjutkan Belanja</a>
      <?php if(isset($_SESSION["customer"]) OR !empty($_SESSION["customer"])): ?>
      <a href="checkout.php" class="btn btn-secondary" style="color: white; font-family: Comic Sans MS;">CheckOut</a>
      <?php else: ?>
      <a href="form_login.php" class="btn btn-secondary" style="color: white; font-family: Comic Sans MS;">CheckOut</a>
      <?php endif; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>