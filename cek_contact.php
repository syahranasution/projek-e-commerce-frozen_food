<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pesan = $_POST['pesan'];

$query = mysqli_query($koneksi_db,"INSERT INTO tbl_contact (nama,email,phone,pesan,level) VALUES('$nama','$email','$phone','$pesan','customer')");

if($query){
	echo '<script>
		alert("Pesan dikirim !");
		location.href = "contact.php"; 
	</script>';
}else{
	echo '<script>
		alert("Pesan gagal dikirim !");
		location.href = "contact.php"; 
	</script>';
}
?>