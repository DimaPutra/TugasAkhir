<?php 
session_start();
if(!isset($_SESSION['pelanggan'])){
session_destroy();
}

if(isset($_SESSION['pelanggan'])){
  $idPelanggan=$_SESSION['pelanggan'];
}

include("controller/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dogscumentary</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: TheEvent - v4.8.0
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center ">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="index.html">The<span>Event</span></a></h1>-->
        <a href="index.html" class="scrollto"><img src="" alt="" title=""></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#speakers">Anggota</a></li>
          <li><a class="nav-link scrollto" href="#venue">Portofolio</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <?php if(empty($idPelanggan)){ ?>
      <a class="buy-tickets scrollto" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="premium-access" href="#buy-ticket-modal">Login</a>
      <?php } ?>
      <?php if(!empty($idPelanggan)){ 
      $select = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$idPelanggan'");
      foreach($select as $a){  
        $nama = $a['nama_pelanggan'];
      ?>
      <a class="buy-tickets scrollto" href="dashboard/home_pelanggan.php"><?= $nama; ?></a>
      <?php } } ?>


    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0"><span>DOGS</span> CUMENTARY</h1>
      <p class="mb-4 pb-0">KOMUNITAS VIDEOGRAFI, FOTOGRAFI DAN DESAIN GRAFIS</p>
      <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
      <a href="#about" class="about-btn scrollto">Lihat Profil</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6">
            <h2>Tentang Dogscumentary</h2>
            <p>Dogscumentary adalah komunitas pecinta videografi, fotografi dan desain grafis yang berlokasi di Klaten, Selain 
              menjadi wadah untuk menyalurkan bakat dan minat, Dogscumentary juga melayani masyarakat dengan membuka jasa untuk
              pembuatan Videografi,Fotografi dan Desain Grafis.
            </p>
          </div>
          
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Speakers Section ======= -->
    <section id="speakers">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Anggota Komunitas</h2>
        </div>

        <div class="row">
          <?php 
          $selectAnggota = mysqli_query($koneksi, "SELECT * FROM anggota INNER JOIN spesialisasi ON spesialisasi.id_spesialisasi=anggota.id_spesialisasi");
          foreach($selectAnggota as $sa){
          ?>
          <div class="col-lg-4 col-md-6">
            <div class="speaker" data-aos="fade-up" data-aos-delay="100">
              <img src="assets/img/<?= $sa['foto'];?>" alt="Speaker 1">
              <div class="details">
                <a href="detil.php?id=<?=$sa['id_anggota'];?>"><h3><?= $sa['nama_anggota'];?></h3></a>
                <p><?= $sa['nama_spesialisasi'];?></p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
            <?php } ?>
          

    </section><!-- End Speakers Section -->

    <!-- ======= Venue Section ======= -->
    <section id="venue">

      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Portofolio</h2>
          <p>Beberapa hasil karya dogscumentary</p>
        </div>

        <div class="row g-0">
          <div class="col-lg-6 venue-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.6180742222864!2d110.6954738644844!3d-7.616469994508157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a401d74bc8953%3A0xb592832437216547!2sKuncen%2C%20Delanggu%2C%20Kec.%20Delanggu%2C%20Kabupaten%20Klaten%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1659385162371!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8 position-relative">
                <h3>Delanggu, Klaten</h3>
                <p>Kecamatan Delanggu, Kabupaten Klaten 57471, Jawa Tengah, Indonesia</p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="container-fluid venue-gallery-container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/porto1.png" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/porto1.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/porto2.png" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/porto2.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/porto3.png" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/porto3.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/porto4.png" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/porto4.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/porto5.png" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/porto5.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/porto6.png" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/porto6.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/porto7.png" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/porto7.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="assets/img/porto8.png" class="glightbox" data-gall="venue-gallery">
                <img src="assets/img/porto8.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>
      </div>

    </section><!-- End Venue Section -->

    <!-- ======= Buy Ticket Section ======= -->
    <section id="buy-tickets" class="section-with-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Penawaran Jasa</h2>
          <p>Pelayanan Jasa yang bisa kami berikan</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Video</h5>
                <h6 class="card-price text-center">Rp 2.500.000</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Shooting + Editing</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Video Pernikahan</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Video Klip Musik</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Video Sinematik</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Video Konten (tiktok, ig, youtube)</li>
                </ul>
                <hr>
                <div class="text-center">
                  <?php if(empty($idPelanggan)){?>
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="standard-access">Order Sekarang</button>
                  <?php } ?>

                  <?php if(!empty($idPelanggan)){?>
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#orderVideo">Order Sekarang</button>
                  <?php } ?>


                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Foto</h5>
                <h6 class="card-price text-center">Rp 1.500.000</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Foto Pernikahan</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Foto Produk</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Foto Katalog</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Dokumentasi Event</li>
                </ul>
                <hr>
                <?php if(empty($idPelanggan)){?>
                <div class="text-center">
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="pro-access">Order Sekarang</button>
                </div>
                <?php } ?>

                <?php if(!empty($idPelanggan)){?>
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#orderFoto">Order Sekarang</button>
                  <?php } ?>

              </div>
            </div>
          </div>
          <!-- Pro Tier -->
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Desain Grafis</h5>
                <h6 class="card-price text-center">Rp 2.000.000</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Desain Logo</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Desain Konten (IG, FB, Web)</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Sketsa 3D</li>
                </ul>
                <hr>
                <?php if(empty($idPelanggan)){?>
                <div class="text-center">
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="premium-access">Order Sekarang</button>
                </div>
                <?php } ?>
                <?php if(!empty($idPelanggan)){?>
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#orderDesain">Order Sekarang</button>
                <?php } ?>

              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Modal Login Form -->
      <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Login</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="controller/login.php">
                <div class="form-group">
                  <input type="text" class="form-control" name="username" placeholder="email anda">
                </div>
                <div class="form-group mt-3">
                  <input type="password" class="form-control" name="pasw" placeholder="password anda">
                </div>
                
                <div class="text-center mt-3">
                  <button type="submit" class="btn">Login</button>
                </div>
                <div class="form-group mt-3">
                <a href="views/register.php">saya belum punya akun, klik untuk daftar akun</a>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <!-- Modal Order Video Form -->
      <div id="orderVideo" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Order Video</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="controller/order.php?j=1">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?= $idPelanggan;?>">
                  <label>nama pelanggan</label>
                  <input type="text" class="form-control" name="nama" readonly value="<?= $nama;?>" >
                </div>
                <div class="form-group mt-3">
                <label>Jenis Order</label>
                  <input type="text" class="form-control" name="jenis" readonly value="videografi">
                </div>

                <div class="form-group mt-3">
                <label>Deadline Order (Digunakan pada)</label>
                  <input type="date" class="form-control" name="tanggal" id="deadline" min="<?php echo date('Y-m-d'); ?>" placeholder="deadline order">
                </div>

                <div class="form-group mt-3">
                <label>Catatan / Detail Order</label>
                  <textarea type="text" class="form-control" name="catatan" placeholder="catatan/detail order"></textarea>
                </div>
                
                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary">Order</button>
                </div>
                
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <!-- Modal Order Foto Form -->
      <div id="orderFoto" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Order Foto</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="controller/order.php?j=2">
                <div class="form-group">
                	
                  <input type="hidden" name="id" value="<?= $idPelanggan;?>">

                  <label>nama pelanggan</label>
                  <input type="text" class="form-control" name="nama" readonly value="<?= $nama;?>" >
                </div>
                <div class="form-group mt-3">
                <label>Jenis Order</label>
                  <input type="text" class="form-control" name="jenis" readonly value="fotografi">
                </div>

                <div class="form-group mt-3">
                <label>Deadline Order (Digunakan pada)</label>
                  <input type="date" class="form-control" name="tanggal" id="deadline" min="<?php echo date('Y-m-d'); ?>" placeholder="deadline order">
                </div>

                <div class="form-group mt-3">
                <label>Catatan / Detail Order</label>
                  <textarea type="text" class="form-control" name="catatan" placeholder="catatan/detail order"></textarea>
                </div>
                
                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary">Order</button>
                </div>
                
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <!-- Modal Order desain Form -->
      <div id="orderDesain" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Order Desain Grafis</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="controller/order.php?j=3">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?= $idPelanggan;?>">
                  <label>nama pelanggan</label>
                  <input type="text" class="form-control" name="nama" readonly value="<?= $nama;?>" >
                </div>
                <div class="form-group mt-3">
                <label>Jenis Order</label>
                  <input type="text" class="form-control" name="jenis" readonly value="desain grafis">
                </div>

                <div class="form-group mt-3">
                <label>Deadline Order (Digunakan pada)</label>
                  <input type="date" class="form-control" name="tanggal" id="deadline" min="<?php echo date('Y-m-d'); ?>" placeholder="deadline order">
                </div>

                <div class="form-group mt-3">
                <label>Catatan / Detail Order</label>
                  <textarea type="text" class="form-control" name="catatan" placeholder="catatan/detail order"></textarea>
                </div>
                
                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary">Order</button>
                </div>
                
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->



    </section><!-- End Buy Ticket Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Hubungi Kami</h2>
          
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <address>Delanggu, Klaten 57471, Jawa Tengah</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>No Telp</h3>
              <p><a href="">+62895392224080</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="">dogscumentary@gmail.com</a></p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="assets/img/logo.png" alt="TheEvenet">
            <p>Dogscumentary adalah komunitas pecinta videografi, fotografi dan desain grafis yang berlokasi di Solo, Selain 
              menjadi wadah untuk menyalurkan bakat dan minat dogscumentary juga melayani masyarakat dengan membuka jasa untuk
              pembuatan video, pemotretan dan desain grafis.</p>
          </div>


          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Delanggu<br>
              Klaten, 57471<br>
              Jawa Tengah <br>
              <strong>Telp</strong>+62895392224080<br>
              <strong>Email:</strong> dogcumentary@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
      -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
	  $( function() {
	    $( "#deadline" ).datepicker(
	    	{minDate: 0}
	    );
	  } );
	  </script>

</body>

</html>