<?php 
    session_start();
    include 'koneksi.php';

    //mendapatkan id_pembelian dari url
    $idpem = $_GET["id"];
    $ambil = $koneksi_db->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
    $detpem = $ambil->fetch_assoc();

    //mendapatkan id_pelanggan yg beli
    $id_pelanggan_beli = $detpem["id_pelanggan"];
    //mendapatkan id-pelanggan yg login
    $id_pelanggan_login = $_SESSION["customer"]["id_pelanggan"];

    if ($id_pelanggan_login !== $id_pelanggan_beli) 
    {
        echo "<script>alert('jangan nakal');</script>";
        echo "<script>location='riwayat.php';</script>";
        exit();    
    }
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.1-web/css/all.min.css">

    <title>Pembayaran</title>
  </head>
  <body>

    <?php include 'menu.php'; ?>

    <div class="container">
        <h2>Konfirmasi Pembayaran</h2>
        <p>Kirim Bukti Pembayaran Anda Disini</p>
        <div class="alert alert-info">Total Tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Penyetor</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label>No. Rekening</label>
                <input type="text" class="form-control" name="norek">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="1">
            </div>
            <div class="form-group">
                <label>Foto Bukti</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger">Foto Bukti Harus JPG Maksimal 2MB</p>
            </div>
            <button class="btn btn-secondary" name="kirim">Kirim</button>
        </form>
    </div>

    <?php 

        //jk ada tombol kirim ditekan
        if (isset($_POST["kirim"])) 
        {
            //upload dlu foto bukti
            $namabukti = $_FILES["bukti"]["name"];
            $lokasibukti = $_FILES ["bukti"]["tmp_name"];
            $namafiks = date("YmdHis") .$namabukti;
            move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

            $nama = $_POST["nama"];
            $bank = $_POST["bank"];
            $norek = $_POST["norek"];
            $jumlah = $_POST["jumlah"];
            $tanggal = date("Y-m-d");

            //simpan pembayaran
            $koneksi_db->query("INSERT INTO pembayaran(id_pembelian,nama,bank,no_rek,jumlah,tanggal,bukti) VALUES('$idpem','$nama','$bank','$norek','$jumlah','$tanggal','$namafiks')");

            //update dong data pembelian nya dari pending menjadi sudah kirim  pembayaran
            $koneksi_db->query("UPDATE pembelian SET status_pembelian = 'sudah kirim pembayaran'WHERE id_pembelian='$idpem'");

            echo "<script>alert('TerimaKasih Sudah Mengirimkan Bukti Pembayaran');</script>";
            echo "<script>location='riwayat.php';</script>";
        }

     ?>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>