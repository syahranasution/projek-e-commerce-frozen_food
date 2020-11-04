<?php
	$koneksi_db = mysqli_connect("localhost","root","","db_frozen_food");
	// $koneksi_db = mysqli_connect("localhost","frow7184_root","Jropx5#zvyXl","frow7184_frozen_food");

	//check connection
	if (mysqli_connect_errno()) {
		echo "Koneksi Database Gagal :" .mysqli_connect_error();
	}
?>