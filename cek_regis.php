<?php
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['nama_pelanggan'];
$telepon = $_POST['telepon'];

$query = mysqli_query($koneksi_db,"INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telpon_pelanggan,level) VALUES('$email','$password','$username','$telepon','customer')");

if($query){
	echo '<script>
		alert("Create account succesc !");
		location.href = "form_login.php"; 
	</script>';
}else{
	echo '<script>
		alert("Query failed !");
		location.href = "form_register.php"; 
	</script>';
}
?>