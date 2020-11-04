<header>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-12">
            
          </div>

            <div class="col-md-4 col-12 text-center">
               <h2 class="my-md-3 site-title text-white"><i class="far fa-snowflake"></i> | Frozen Food's</h2>
            </div>
            <div class="col-md-4 col-12 text-right">
              
            </div>
       </div>
      </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="shop.php">SHOP</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="kontak.php">CONTACT</a>
            </li>
            <?php if(isset($_SESSION["customer"])): ?>
            <li class="nav-item active">
              <a class="nav-link" href="riwayat.php">RIWAYAT</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="logout.php">LOGOUT</a>
            </li>
            <?php else: ?>
            <li class="nav-item active">
              <a class="nav-link" href="form_login.php">LOGIN</a>
            </li>
          </ul>
          <?php endif; ?>
        </div>
      </div>

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="fas fa-times search-close js-search-close"></a>
          <form action="#" method="post">
            <input type="text" class="form-control" id="search-bar" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="navbar-nav">
        <nav class="navbar navbar-light bg-light">

          <li class="nav-item border rounded-cicle mx-2 search-ico">
            <i class="fas fa-search p-2 js-search-open" data-toggle="tooltip" title="Search"></i>
            <!-- <a href="#" class="icons-btn d-inline-block "><span class="icon-search"></span></a> -->
          </li>

          <?php
          if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang']))
          {
            $jumlah_keranjang = 0;
          }else{
            $jumlah_keranjang = count($_SESSION['keranjang']);
          }
          ?>
          <li class="nav-item border rounded-cicle mx-2 search-ico" onclick="location.href = 'keranjang.php'" data-toggle="tooltip" title="Keranjang">
            <span class="fa-stack fa-1x">
              <i class="cart-badge fas fa-shopping-cart fa-stack-1x xfa-inverse" data-count="<?= $jumlah_keranjang ?>"></i>
            </span>
          </li>

          <li class="nav-item border rounded-cicle mx-2 search-ico" onclick="location.href = './ci_admin/'">
            <i class="fas fa-user-lock p-2" data-toggle="tooltip" title="Admin"></i>
          </li>

      </div>
    </nav>
