<?php 
session_start( );

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

    <title>SHOP</title>
  </head>
  <body>
    <?php include 'menu.php'; ?>

      <p><b style="font-family: Comic Sans MS; color: #87CEEB;"><center><h3>"Selamat Berbelanja <i class="fas fa-cart-plus"></i> "<hr class="col-md-3"> </h3></center></b></p>

      <section class="konten">
        <div class="container"> 
          <div class="row">
            <?php $ambil = $koneksi_db->query("SELECT * FROM tbl_produk"); ?>
            <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
            <div class="col-md-3 mr-4 ml-2 pt-4 text-center">
              <div class="card produk-card" style="width: 18rem; height: 30rem; margin-left: 80px; background-color: #87CEEB;">
                
              <img src="img/<?php echo $perproduk['foto_produk'] ?>" class="card-img-top" alt="..." style="height: 220px;">
              <div class="card-body text-secondary" style="font-family: Comic Sans MS;">
                <h4 class="card-title text-white searched"><b><?php echo $perproduk['nama_produk'] ?></b></h4>
                <p class="text-white"><b>Stok : <?php echo $perproduk['stok_produk'] ?></b></p>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i><br><br>
                <h5 class="card-text text-white"><b>Rp. <?php echo number_format($perproduk['harga_produk']); ?></b></h5>

                 <div class="navbar-nav">
                  <nav class="navbar navbar ml-2 mr-2">
                    <li class="nav-item border border-secondary mx-2 search-icon text-secondary">
                      <i class="fas fa-cart-plus fa-lg p-2" data-toggle="tooltip" title="Masukan Keranjang" onclick="location.href = 'beli.php?id=<?php echo $perproduk['id_produk']; ?>'"></i>
                    </li>

                    <li class="nav-item border border-secondary mx-2 search-icon text-secondary">
                      <i class="fas fa-paint-brush fa-lg p-2" data-toggle="tooltip" title="Detail" onclick="location.href = 'detail.php?id=<?php echo $perproduk['id_produk']; ?>'"></i>
                    </li>

                    <li class="nav-item border border-secondary mx-2 search-icon text-secondary">
                      <i class="fas fa-phone-alt fa-lg p-2" data-toggle="tooltip" title="Contact" onclick="location.href = 'kontak.php'"></i>
                    </li>
                  </nav>
                </div>

              </div>
            </div>
            </div>

          <?php } ?>

          </div>
        </div>
      </section> 

     <br><br>
     <?php include 'footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>