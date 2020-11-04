<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="css/style_register.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.1-web/css/all.min.css">

    <title>Register</title>
  </head>
  <body>
  	<?php include 'menu.php'; ?>
	    <div class="kotak_regis">
			<center><p class="tulisan_login">SILAHKAN REGISTER</p></center>
	 
			<form action="cek_regis.php"  method="post">
	 			<label><i class="fas fa-envelope-open"></i> Email</label>
				<input type="email" name="email" class="form_regis" placeholder="Email" required="required">

				<label><i class="fas fa-key"></i> Password</label>
				<input type="password" name="password" class="form_regis" placeholder="Password " required="required">

				<label><i class="fas fa-users"></i> Username</label>
				<input type="text" name="nama_pelanggan" class="form_regis" placeholder="Username" required="required">
	 			
	 			<label><i class="fas fa-phone-alt"></i> Telepon</label>
				<input type="text" name="telepon" class="form_regis" placeholder="Telepon" required="required">

				<input type="submit" class="tombol_regis" name="simpan" value="SIMPAN"><br>
	 			
			</form>
			
		</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>
