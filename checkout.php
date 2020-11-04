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

    <title>Checkout</title>
  </head>
  <body>
    <?php include 'menu.php'; ?>

    <p><b style="font-family: Comic Sans MS; color: var(--primary-color) !important;"><center><h3>CheckOut <i class="fas fa-cart-plus"></i></h3></center></b></p>


  <div class="col-md-10 p-5 pt-2">
    <h3 style="color: var(--primary-color) !important; font-family: Comic Sans MS;"><i class="fas fa-cart-plus"></i> <b>Data Perbelanjaan</b></h3><hr>
       <table class="table table-striped" style="background-color: var(--primary-color) !important; font-family: Comic Sans MS;">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">SubHarga</th>
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
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_produk']; ?></td>
                <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                <td><?php echo $jumlah; ?></td>
                <td>Rp. <?php echo number_format($subharga); ?></td>
              </tr>

             <?php $nomor++; ?>
             <?php $totalbelanja+=$subharga ?>
             <?php endforeach ?>

          </tbody>
      <tfoot>
        <tr>
          <th colspan="4">Total Belanja</th>
          <th>Rp. <?php echo number_format($totalbelanja) ?></th>
        </tr>
      </tfoot>
      </table>

    <form method="post">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              <label>Nama</label>
            <input type="text" readonly value="<?php echo $_SESSION["customer"]["nama_pelanggan"] ?>" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>No. Telp</label>
            <input type="text" readonly value="<?php echo $_SESSION["customer"]["telpon_pelanggan"] ?>" class="form-control">
          </div>
        </div>

        <!-- <div class="col-md-4">
          <select class="form-control" name="id_ongkir">
            <option value="">Pilih Ongkos Kirim</option>
            <?php 
            //  $ambil = $koneksi_db->query("SELECT * FROM ongkir");
            //  while($perongkir = $ambil->fetch_assoc()) {
              ?>
            <option value="<?php echo $perongkir["id_ongkir"] ?>">
              <?php echo $perongkir['nama_kota'] ?>.
              Rp. <?php echo number_format($perongkir["tarif"]) ?>
            </option>
            <?php //} ?>
          </select>
        </div> -->
      </div>
      <div class="form-group">
        <h5>Alamat Pengiriman</h5>
      </div>
      <div class="form-group">
        <label for="kota">Kota/Kabupaten</label>
        <select class="form-control" name="ongkir_kota" id="ongkir_kota">
            <option value="">Pilih Kota</option>
            <option value="pulau_seribu">Kabupaten Kepulauan Seribu</option>
            <option value="jakarta_barat">Kota Jakarta Barat</option>
            <option value="jakarta_pusat">Kota Jakarta Pusat</option>
            <option value="jakarta_selatan">Kota Jakarta Selatan</option>
            <option value="jakarta_timur">Kota Jakarta Timur</option>
            <option value="jakarta_utara">Kota Jakarta Utara</option>
          </select>
      </div>
      <div class="form-group" id="group_kec">
        <label for="kota">Kecamatan</label>
        <select class="form-control" name="ongkir_kec" id="ongkir_kec">
            <option value="">Pilih Kecamatan</option>
          </select>
      </div>
      <div class="form-group" id="group_ongkir">
        <label for="kota">Biaya Kirim</label>
        <select type="text" class="form-control" name="id_ongkir" id="ongkir" readonly required>
        </select>
      </div>
     <div class="form-group" id="group_alamat">
       <label>Alamat Lengkap Pengiriman</label>
       <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan Alamat lengkap Pengiriman (Termaksud Kode Pos)" required></textarea>
     </div>
    <br> <button class="btn btn-secondary" name="checkout" id="btn_checkout">Checkout</button>
    </form>

    <?php 
    if(isset($_POST["checkout"]))
    {
      $id_pelanggan = $_SESSION["customer"]["id_pelanggan"];
      $id_ongkir = $_POST["id_ongkir"];
      $tanggal_pembelian = date("Y-m-d");
      $alamat_pengiriman = $_POST['alamat_pengiriman'];

     $ambil =  $koneksi_db->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
     $arrayongkir = $ambil->fetch_assoc();
     $nama_kota = $arrayongkir['nama_kota'];
     $tarif = $arrayongkir['tarif'];

      $total_pembelian = $totalbelanja + $tarif;

      //1. menyimpan data ke tabel pembelian
      $koneksi_db->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian', '$nama_kota','$tarif','$alamat_pengiriman')");

      //mendapatkan id_pembelian barusan tadi
      $id_pembelian_barusan = $koneksi_db->insert_id;

      foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
      {
       //mendapatkan data produk berdasarkan id_produk
       $ambil = $koneksi_db->query("SELECT * FROM tbl_produk WHERE id_produk='$id_produk'");
       $perproduk = $ambil->fetch_assoc();

       $nama = $perproduk['nama_produk'];
       $harga = $perproduk['harga_produk'];

       $subharga = $perproduk['harga_produk']*$jumlah;
        // $subharga = $perproduk['harga_produk']*$jumlah;
        $koneksi_db->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,subharga,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$subharga','$jumlah')");

        //skrip update stook
        $koneksi_db->query("UPDATE tbl_produk SET stok_produk=stok_produk -$jumlah WHERE id_produk='$id_produk'");
      }

      //mengkosongkan keranjang belanja
      unset($_SESSION["keranjang"]);

      //tampilan di alihkan kehalaman nota, nota dari pembelian barusan 
      echo "<script>alert('pembelian sukses');</script>";
      echo "<script>location='nota.php?id=$id_pembelian_barusan'; </script>" ;
    }
     ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/ongkir.js"></script>
  </body>
</html>