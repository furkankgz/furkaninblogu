<?php  
ob_start();
session_start();

include 'nedmin/netting/baglan.php';
include 'nedmin/production/fonksiyon.php';
//veritabanından belirli veriyi çekme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayar WHERE ayar_id=:id");
$ayarsor->execute(array(
  'id' => 1
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$anasayfasor=$db->prepare("SELECT * FROM anasayfa");
$anasayfasor->execute();
$anasayfacek=$anasayfasor->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- ayar tablosundaki verileri çekme -->
  <meta name="description" content="<?php echo $ayarcek['ayar_description'] ?>">
  <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'] ?>">
  <meta name="author" content="<?php echo $ayarcek['ayar_author'] ?>">
  <!-- başlığı veritabanından çekme -->
  <title><?php echo $ayarcek['ayar_title']; ?></title>
  <!-- Sayfa Tasarımı css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Yazı Kısmı css -->
  <link rel="stylesheet" href="css/yazi.css">
  <!-- Sayfa animasyonu -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- Bootstrap CSS dosyası -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font ve simgeleri sayfaya ekleyebilmek için kullandığımız kod kısmı -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href="css/clean-blog.min.css" rel="stylesheet">
  <style>

  </style>
</head>

<body>
  <!-- Navbar başlangıç kısmı --> 
  <!-- Anasayfa-Hakkında-Yazılar-İletişim olarak dört adet navbar oluşturdum. -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <?php include 'navbar.php'; ?>
  </nav>
  <!-- Navbar bitiş -->

  <!-- Header Başlangıç Kısmı -->
  <!-- navbar kısmının hemen alt kısmına başlık ve resim ekledim. -->
  <header  class="masthead" style="background-image: url('img/home-bg.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1><?php echo $anasayfacek['anasayfa_baslik'] ?></h1>
            <span class="subheading"> <?php echo $anasayfacek['anasayfa_altbaslik'] ?> </span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Header Bitiş Kısmı -->

  <!-- Ana Kısım Başlangıç -->

  <div class="padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 text-center mx-auto" data-aos="fade-left">  
          <h1><?php echo $anasayfacek['anasayfa_kisimlarbaslik'] ?></h1>       
          <p class="lead"><?php echo $anasayfacek['anasayfa_kisimlarmetin'] ?></p>
        </div>
      </div>
    </div>
  </div>

  <div id="kod">  
  </div>

  <div class="padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 text-center mx-auto" data-aos="fade-right">
          <h1><?php echo $anasayfacek['anasayfa_kisimlarbaslik2'] ?></h1>
          <p class="lead"><?php echo $anasayfacek['anasayfa_kisimlarmetin2'] ?></p>            
        </div>
      </div>
    </div>
  </div>

  <div id="kamera">
  </div>

  <div class="padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 text-center mx-auto" data-aos="fade-left">
          <h1><?php echo $anasayfacek['anasayfa_kisimlarbaslik3'] ?></h1>
          <p class="lead"><?php echo $anasayfacek['anasayfa_kisimlarmetin3'] ?></p>                 
        </div>
      </div>
    </div>
  </div>

  <div id="study">  
  </div>


  <!-- Ana Kısım Bitiş -->
  <hr>
  <!-- Footer Kısmı Başlangıç-->

  <?php include 'footer.php'; ?>
  <!-- Footer Kısmı Bitiş -->
  <!-- Sayfa animasyonu başlangıç -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      offset: 250,
      duration: 1000
    });
  </script>
  <!-- Sayfa animasyonu bitiş -->

  <!-- Bootstrap ve Ek stiller  Başlangıç -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/clean-blog.min.js"></script>
  <!-- Bootstrap ve Ek stiller Bitiş -->
</body>

</html>
