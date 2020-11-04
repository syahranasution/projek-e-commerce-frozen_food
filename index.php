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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.1-web/css/all.min.css">

    <title>Halaman Customer</title>
  </head>
  <body>
    
    <?php include 'menu.php'; ?>

   <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel-responsive">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/img1.jpg" class="d-block w-100" alt="..." style="height: 550px;">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/img3.jpg" class="d-block w-100" alt="..." style="height: 550px;">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div> 

    <p><b style="font-family: Comic Sans MS; color: var(--primary-color) !important;"><center><h3>"Bahan & Cara Pembuatan"</h3></center></b></p>

      <?php
          $query = mysqli_query($koneksi_db, "SELECT * FROM tbl_produk");
          if(mysqli_num_rows($query) > 0){
            while($data = mysqli_fetch_array($query)){
        ?>
        <div class="container">
          <div class="row">
            <div class="col-md-4 mr-4 ml-5 pt-4">
              <div class="media mt-3 ml-3" style="background-color: var(--primary-color) !important; width: 1050px;">
                  <img src="img/<?php echo $data['foto_produk'] ?>" class="mr-3" style="width: 350px; height: 250px; ">
                  <div class="media-body" style="margin-left: 10px;">
                    <h2 class="media-title text-white" style="margin-top: 20px; font-family: Comic Sans MS;"><b><?php echo $data['nama_produk'] ?></b></h2>
                    <p class="text-white  mr-3"><?php echo ($data['deskripsi_produk']); ?></p>
                    <a href="resep.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-secondary" style="font-family: Comic Sans MS;">RESEP PEMBUATAN</a>
                  </div>
                </div>
            </div>
          </div>
        </div>

     <?php }} ?>

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