<?php session_start() ?>
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

    <title>Contact</title>
  </head>
  <body>
    <?php include 'menu.php'; ?>

    <div class="jumbotron jumbotron-fluid text-center">
      <div class="container">
        <img src="img/f.PNG" class="rounded-circle" style="width: 150px; height: 140px;">
        <p class="lead" style="color: #00BFFF;"><b><i class="far fa-snowflake fa-sm fa-spin"></i> | Frozen Food's</b></p>
      </div>
    </div>

     <section class="contact spad mt-5">
        <div class="container">
            <div class="row" style="color: #00BFFF; font-family: Comic Sans MS;">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span><i class="fas fa-phone-alt fa-2x"></i></span>
                        <h4>Phone</h4>
                        <p>085714318028</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"><i class="fas fa-map-marker-alt fa-2x"></i></span>
                        <h4>Address</h4>
                        <p>SMK Telkom Jakarta Daan Mogot</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"><i class="far fa-clock fa-2x"></i></span>
                        <h4>Open time</h4>
                        <p>10:00 am to 23:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"><i class="far fa-envelope fa-2x"></i></span>
                        <h4>Email</h4>
                        <p>frozenfood38@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="map my-5 mx-3">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.8228670022254!2d106.74856921430964!3d-6.154472962036419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7c113c644b5%3A0xa3a809c8c4627262!2sSMK%20Telkom%20Jakarta!5e0!3m2!1sen!2sid!4v1599290751183!5m2!1sen!2sid" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

     <div class="container contact-form">
            <div class="contact-image text-center" style="color: #00BFFF; font-family: Comic Sans MS;">
                <i class="fas fa-address-book fa-2x"></i>
                <h3 class="mt-2">Drop Us a Message</h3>
            </div>
            <form action="cek_contact.php" method="post">
               <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text"  name="nama" class="form-control" placeholder="Nama *" required="required" />
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email *" required="required" />
                        </div>
                        <div class="form-group">
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="No. Telepon *" required="required" />
                        </div>
                        <div class="form-group">
                             <input type="submit" name="submit" class="btn-submit" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea id="pesan" name="pesan" class="form-control" placeholder="Pesan anda *" style="width: 100%; height: 150px;" required="required"></textarea>
                        </div>
                    </div>
                </div>
            </form>
    </div>

    
     <?php include 'footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>