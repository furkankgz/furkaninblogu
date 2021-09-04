<?php 
include 'nedmin/netting/baglan.php'; // veritabanı bağladığımız kod

$blogsor=$db->prepare("SELECT * FROM blog WHERE blog_id=:blog_id"); // blog tablosunu sayfaya bağlıyoruz verileri çekmek için
$blogsor->execute(array('blog_id' => @$_GET['blog_id']));
$blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Furkan'ın Blogu</title>

  <!-- Bootstrap CSS dosyası -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font ve simgeleri sayfaya ekleyebilmek için kullandığımız kod kısmı -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>
  <!-- Navigasyon başlangıç kısmı --> 
  <!-- Anasayfa-Hakkında-Yazılar-İletişim olarak dört adet navbar oluşturdum. -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <?php include 'navbar.php'; ?>
  </nav>
  <!-- Navigasyon bitiş -->

  <!-- Header Başlangıç Kısmı -->
  <!-- navbar kısmının hemen alt kısmına başlık ve resim ekledim. -->

    <header  class="masthead" style="background-image: url('<?php echo $blogcek['blog_foto'] ?>');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h2><?php echo $blogcek['blog_kategori'] ?></h2> <!-- Blog verileri sayfaya çekiliyor -->
              <span class="subheading"><?php echo $blogcek['blog_ad'] ?></span>
              <small>-<?php echo $blogcek['blog_zaman'] ?>-</small>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Header Bitiş Kısmı -->

    <!-- Ana Kısım Başlangıç -->

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p><?php echo $blogcek['blog_detay'] ?></p>
        </div>
      </div>
    </div>

  <!-- Ana Kısım Bitiş -->
  <hr>
  <!-- Footer Kısmı Başlangıç-->
  
  <?php include 'footer.php'; ?>
</body>
</html>