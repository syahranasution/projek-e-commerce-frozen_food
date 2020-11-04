<?php
    include 'koneksi.php';

    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];

    $ambil = $koneksi_db->query("SELECT * FROM ongkir WHERE nama_kota='$kota' AND nama_kecamatan='$kecamatan';");

    if($ongkir = $ambil->fetch_assoc()){
        echo json_encode($ongkir);
    }else{
        echo json_encode(null);
    }
?>