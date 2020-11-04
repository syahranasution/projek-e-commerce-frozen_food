<?php 
session_start();
include 'koneksi.php';

mysqli_query($koneksi_db, "UPDATE pembelian SET status_pembelian = 'batal' WHERE id_pembelian NOT IN (SELECT id_pembelian FROM pembayaran) AND tanggal_pembelian <= DATE_SUB(NOW(), INTERVAL 1 DAY);");
mysqli_query($koneksi_db, "DELETE FROM pembelian WHERE id_pembelian NOT IN (SELECT id_pembelian FROM pembayaran) AND tanggal_pembelian <= DATE_SUB(NOW(), INTERVAL 2 DAY) AND status_pembelian = 'batal';");

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

    <title>Riwayat Pelanggan</title>
  </head>
  <body>
    
    <?php include 'menu.php'; ?>
    
    <section class="riwayat">
      <center>
        <h3>Riwayat Belanja <?php echo $_SESSION["customer"]["nama_pelanggan"] ?></h3>
      </center>
    </section>
    
    <div class="container-fluid">
      <table class="table table-striped" style="background-color: var(--primary-color) !important; font-family: Ink Free;">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Status</th>
            <th scope="col">Total</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
          <tbody>
            <?php 
              $nomor=1;
              //mendapatkan id_pelanggan yg login dari sistem
              $id_pelanggan = $_SESSION["customer"]["id_pelanggan"];

              $ambil = $koneksi_db->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan' ORDER BY id_pembelian DESC;");

              while ($pecah = $ambil->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                <td>
                  <?php echo $pecah['status_pembelian']; ?>
                  <br>
                  <?php if (!empty($pecah['resi_pengiriman'])): ?>
                    Resi : <?php echo $pecah['resi_pengiriman']; ?>
                  <?php endif ?>
                </td>
                <td>Rp. <?php echo number_format($pecah['total_pembelian']); ?></td>
                <td>
                  <a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-secondary btn-xs">Nota</a>
                  <?php if($pecah['status_pembelian']=="pending"):?>
                  <a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-primary btn-xs">Input Pembayaran</a>
                  <?php else: ?>
                    <a href="lihat_pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-warning">Lihat Pembayaran</a>
                  <?php endif ?>
                </td>
              </tr>
              <?php $nomor++; ?>
            <?php } ?>
          </tbody>
      </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>