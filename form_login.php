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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style_login.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.1-web/css/all.min.css">

    <title>Login Pelanggan</title>
  </head>
  <body>
    <?php  include 'menu.php'; ?>

      <div class="kotak_login">
        <p class="tulisan_login">Silahkan login <i class="fas fa-user-lock"></i></p>
        <form method="post">
          <label><i class="fas fa-users"></i> Username</label>
          <input type="text" name="username" class="form_login" placeholder="Username ..">
     
          <label><i class="fas fa-key"></i> Password</label>
          <input type="password" name="password" class="form_login" placeholder="Password ..">
     
          <input type="submit" class="tombol_login" name="simpan" value="LOGIN">
     
          <br/>
          <br/>
          <center>
            <a class="link" href="form_register.php">Create Account</a>
          </center>
        </form>
        
      </div>


      <?php 
    //jk ada tmbl simpan(tombol simpan ditekan)
    if (isset($_POST["simpan"]))
    {

      $username = $_POST['username'];
      $password = $_POST['password'];
      //lakukan query mengecek akun di table customer di db
      $ambil = $koneksi_db->query("SELECT * FROM pelanggan WHERE nama_pelanggan = '$username' AND password_pelanggan = '$password'");


      //menghitung akun yg terambil
      $akunyangcocok = $ambil ->num_rows;

      //jika 1 akun yg cocok maka diloginkan
      if ($akunyangcocok==1) 
      {
        //anda sukses login
        //mendapatkan akun dlm bbentuk array
        $akun = $ambil->fetch_assoc();
        //simpan ke sessiion pelanggan
        $_SESSION["customer"] = $akun;
        echo "<script>alert('Login Anda Berhasil');</script>";
        //jika sudah belanja
        if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
        {
          echo "<script>location='checkout.php';</script>";
        }
        else
        {
          echo "<script>location='riwayat.php';</script>";
        }
      }
      else{
        //anda gagal login
        echo "<script>alert('Anda Gagal Login, Daftarkan Akun Anda');</script>";
        echo "<script>location='form_register.php';</script>";
      }
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
