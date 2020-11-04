<?php 
session_start();

include 'koneksi.php';

//mendapatkan id produk dari url
$id_produk = $_GET["id"];

//query ambil data
$ambil = $koneksi_db->query("SELECT * FROM tbl_produk WHERE id_produk= '$id_produk'");
$detail = $ambil->fetch_assoc();

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

    <title>RESEP</title>
  </head>
  <body>

 <?php include 'menu.php'; ?>

  <p><b style="font-family: Comic Sans MS; color: var(--primary-color) !important;"><center><h3>"Resep Frozen Food's"</h3></center></b></p>

    <br><br>
    <section class="konten" style="font-family: Comic Sans MS;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="img/<?php echo $detail["foto_produk"]; ?>" style="width: 500px;" class="img-responsive">
          </div>
          <div class="col-md-6">
            <h2 style="font-family: Comic Sans MS;">"<?php echo $detail["nama_produk"] ?>"</h2>
            <p><b>Bahan-bahan :</b> <br> <?php echo $detail["bahan"]; ?></p>
            <p><b>Cara Pembuatan :</b> <br> <?php echo $detail["bahan"]; ?></p>
            <a href="index.php" class="btn btn-secondary" style="font-family: Comic Sans MS;">KEMBALI</a>
          </div>
        </div>
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