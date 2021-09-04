<?php  
include 'nedmin/netting/baglan.php';
$blogfotosor=$db->prepare("SELECT * FROM blogfoto");
$blogfotosor->execute();

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
  <!--Galeri için kullandıklarım -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
  <link rel="stylesheet" href="css/gallery-grid.css">

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
  <header  class="masthead" style="background-image: url('img/galeri.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>GALERİ</h1>
            <span class="subheading">Anılarını Biriktir</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <!-- Header Bitiş Kısmı -->

  <!-- Ana Kısım Başlangıç -->

  <div class="container gallery-container">   
    <div class="tz-gallery">
      <div class="row">
        <?php while($blogfotocek=$blogfotosor->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class="col-sm-6 col-md-4">
            <a class="lightbox" href="<?php echo $blogfotocek['blogfoto_resimyol'] ?>">
              <img src="<?php echo $blogfotocek['blogfoto_resimyol'] ?>" alt="<?php echo $blogfotocek['blogfoto_ad']  ?>">
            </a>
          </div>   
        <?php } ?>        
      </div>
    </div>
  </div>

  <!-- Ana Kısım Bitiş -->
  <hr>
  <!-- Footer Kısmı Başlangıç-->
  
  <?php include 'footer.php'; ?>
  <!-- Galeri için script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
  <script>
    baguetteBox.run('.tz-gallery');
  </script>
</body>
</html>