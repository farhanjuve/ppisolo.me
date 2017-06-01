<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PPI Surakarta</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
    
  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">
  
  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">
  
  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="<?php echo base_url("favicon.ico")?>" rel="shortcut icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet"> 
  
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="<?php echo base_url("assets/lib/bootstrap/css/bootstrap.min.css")?>">
  
  <!-- Libraries CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url("assets/lib/font-awesome/css/font-awesome.min.css")?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/lib/animate-css/animate.min.css")?>">
  
  <!-- Main Stylesheet File -->
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css")?>">
  
  <!-- dari bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- =======================================================
  Theme Name: Imperial
  Theme URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
  Author: BootstrapMade.com
  Author URL: https://bootstrapmade.com
======================================================= -->
</head>

<body>
  
<!--==========================
  Hero Section
============================-->
  <section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">
        <div class="hero-logo">
          <img class="" src="<?php echo base_url("assets/img/logo.png")?>" alt="Imperial">
        </div>
        
        <h1>Purna Paskibraka Indonesia</h1>
        <h2>Kota Surakarta
            <!--<span class="rotating">beautiful graphics, functional websites, working mobile apps</span>-->
        </h2>
        <div class="actions">
          <a href="<?php echo base_url()."Crud/Daftar"; ?>" class="btn-get-started">Login</a>
          <a href="#about" class="btn-services">Tentang Kami</a>
        </div>
      </div>
    </div>
  </section>
  
<!--==========================
  Header Section
============================-->
  <header id="header">
    <div class="container">
    
      <div id="logo" class="pull-left">
        <a href="#hero"><img src="<?php echo base_url("assets/img/logo.png")?>" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Header 1</a></h1>-->
      </div>
        
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Berita</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
    
<!--==========================
  Berita Section
============================-->
  <section id="services">
    <?php
      $getIdB = $this->db->query("SELECT max(id_artikel) FROM `artikel`");
      $getIdB = $getIdB->result_array();
      //json_encode($getIdB);
      $ber = $this->db->query("SELECT * FROM `artikel` WHERE `id_artikel` = " .$getIdB[0]['max(id_artikel)']);
      $ber = $ber->result_array();
        foreach($ber as $d){
            $judulberita = $d['judul'];
            $isiberita = $d['isi'];
            $gambarberita = $d['gambar_artikel'];
        }
    ?> 
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Berita Terbaru!</h3>
          <div class="section-title-divider"></div>
        </div>
      </div>
    </div>
    <div class="container about-container wow fadeInUp">
      <div class="row">
        <!--<div class="col-md-6 col-md-push-6 about-content">-->
          <h2 class="about-title"><?php echo $judulberita; ?></h2>
            <p class="about-text">
                <img src="<?php echo base_url().$gambarberita; ?>" >
                <?php echo $isiberita; ?>
            </p>
        <!--</div>-->
      </div>
    </div>
  </section>
  
<!--==========================
  Services Section
============================-->
  
<!--==========================
  About Us Section
============================-->  
  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Sekilas Tentang PPI</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Purna Paskibraka Indonesia</p>
        </div>
      </div>
    </div>
    <div class="container about-container wow fadeInUp">
      <div class="row">
        <div class="col-md-6 col-md-push-6 about-content">
          <p class="about-text">
            Paskibraka adalah singkatan dari Pasukan Pengibar Bendera Pusaka dengan tugas utamanya mengibarkan duplikat bendera pusaka dalam upacara peringatan proklamasi kemerdekaan Indonesia di 3 tempat, yakni tingkat Kabupaten/Kota (Kantor Bupati/Wali Kota), Provinsi (Kantor Gubernur), dan Nasional (Istana Merdeka). Anggotanya berasal dari pelajar SMA Sederajat kelas 1 atau 2. Penyeleksian anggotanya biasanya dilakukan sekitar bulan April untuk persiapan pengibaran pada 17 Agustus.

Selama waktu seleksi sampai 16 Agustus, seorang anggota calon Paskibraka dinamakan "CAPASKA" atau Calon Paskibraka. Pada waktu penugasan 17 Agustus, anggota dinamakan "PASKIBRAKA", dan setelah 17 Agustus, dinamakan "PURNA PASKIBRAKA".

Tingkatan Paskibraka ada tiga yaitu:
          </p>
          <p class="about-text">
            Paskibraka Nasional - bertugas di Istana Negara
          </p>
          <p class="about-text">
            Paskibraka Propinsi - bertugas di Pusat pemerintahan gubernur propinsi
          </p>
          <p class="about-text">
            Paskibraka Kota - bertugas di Pusat pemerintahan walikota/kabupaten
          </p>
        </div>
      </div>
    </div>
  </section>
    
<!--==========================
  Porfolio Section
============================-->
    
<!--==========================
  Testimonials Section
============================-->  

<!--==========================
  Team Section
============================-->    
  <section id="team">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Kepengurusan 2014-2019</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Beberapa pimpinan dalam PPI Surakarta</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-3">
          <div class="member">
            <div class="pic"><img src="assets/img/team-1.jpg" alt=""></div>
            <h4>Febrind Chandikya Nuria M</h4>
            <span>Ketua Umum PPI Surakarta</span>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="member">
            <div class="pic"><img src="assets/img/team-3.jpg" alt=""></div>
            <h4>Bayu Arya Putra</h4>
            <span>Ketua Harian PPI Surakarta</span>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="member">
            <div class="pic"><img src="assets/img/team-2.jpg" alt=""></div>
            <h4>Dimas Erdhinta Pratama P</h4>
            <span>Kadep PSDM PPI Surakarta</span>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="member">
            <div class="pic"><img src="assets/img/team-4.jpg" alt=""></div>
            <h4>Achmad Farhan M</h4>
            <span>Sekdep PSDM PPI Surakarta</span>
          </div>
        </div>
        
      </div>  
    </div>
  </section>
    
<!--==========================
  Contact Section
============================--> 
  <section id="contact">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Contact Us</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Apabila terdapat pertanyaan, hubungi kami di :</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-3 col-md-push-2">
          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>Sekretariat PPI Surakarta<br>Jl. Jenggolo Utara II/50<br>Surakarta</p>
            </div>
            
            <div>
              <i class="fa fa-envelope"></i>
              <p>admin@ppisolo.me</p>
            </div>
            
            <div>
              <i class="fa fa-phone"></i>
              <p>0271-713118</p>
            </div>
            
          </div>
        </div>
        
        <div class="col-md-5 col-md-push-2">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="<?php echo base_url().'crud/do_keluhan'?>" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center">
                    <button type="submit" name="keluhkan">Send Message</button>
                </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </section>
  
<!--==========================
  Footer
============================--> 
  <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright">
              &copy; Copyright <strong>Imperial Theme</strong>. All Rights Reserved
            </div>
            <div class="credits">
              <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Imperial
              -->
              Bootstrap Themes by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
  </footer><!-- #footer -->
  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    
  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/morphext/morphext.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/easing/easing.js"></script>
  
  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>
  
  <script src="contactform/contactform.js"></script>
  
    
</body>
</html>