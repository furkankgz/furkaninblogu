<?php 
include 'nedmin/netting/baglan.php';

$blogsor=$db->prepare("SELECT * FROM blog");
$blogsor->execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Furkan'ın Blogu</title>

  <link rel="stylesheet" href="css/blog.css">
  <!-- Makale Kısmı Tasarım css -->
  <link rel="stylesheet" href="css/makale.css"> 
  <!-- Fotograf kısmı css -->
  <link rel="stylesheet" href="css/index.css">
  
  <!-- Bootstrap CSS dosyası -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Font ve simgeleri sayfaya ekleyebilmek için kullandığımız kod kısmı -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href="css/clean-blog.min.css" rel="stylesheet">

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
  <header  class="masthead" style="background-image: url('img/blog-bg.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>BLOG</h1>
            <span class="subheading">Her şey senin elinde.</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <!-- Header Bitiş Kısmı -->

  <!-- Makale Kısım Başlangıç -->
  
  <div class="container">
    <div class="row justify-content-center">
      <?php while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)) { 
        if (isset($_POST['gonder'])) {
          $blogsor=$db->prepare("SELECT * FROM blog WHERE blog_id=:blog_id");
          $blogsor->execute(array(
            'blog_id' => $_POST['blog_id']
          ));
          if($blogsor){
            Header("Location:blog-detay.php?blog_id=blog_id");
          }
        }
        $zaman = explode(" ", $blogcek['blog_zaman']);
        ?>
        <form action="" method="POST">
          <div class="col-md-4">
            <div class="card-shadow text-center" style="width: 20rem;">
              <small style="color: #A9A9A9;">  <?php echo $zaman[0]; ?></small>
              <small style="color: #A9A9A9;">  <?php echo $zaman[1]; ?></small>
              <div class="inner">
                <a href="blog-detay?blog_id=<?php echo $blogcek['blog_id'] ?>">
                  <input type="hidden" name="gonder">
                  <img class="card-img-top" src="<?php echo $blogcek['blog_foto'] ?>" alt="">
                </a>  
              </div>
              <div class="card-body text-center">
                <a style="text-decoration: none;" href="blog-detay?blog_id=<?php echo $blogcek['blog_id'] ?>"><input type="hidden" name="gonder">
                  <p class="subheading text-center centered"><?php echo $blogcek['blog_ad'] ?></p></a>
                </div>
              </div>
            </div>
          </form>
        <?php } ?>
      </div>
    </div>
    <hr>
    <!-- Makale Kısım Bitiş -->

    <!-- Fotograf kısmı Başlangıç 
    <div id="blog-foto">
      <h2 class="text-center post-title">GALERİ | ÖNE ÇIKANLAR</h2> <br>
    </div>
    <div class="foto col-sm-6 col-md-10 col-lg-8 mx-auto">
      <div class="row">
        <div class="box">
          <img src="img/img.jpg" alt="">
        </div>
      </div>

      <div class="row">
        <div class="box">
          <img src="img/img1.jpg" alt="">
        </div>
      </div>

      <div class="row">
        <div class="box">
          <img src="img/img2.jpg" alt="">
        </div>
      </div>

      <div class="row">
        <div class="box">
          <img src="img/img3.jpg" alt="">
        </div>
      </div>
    </div>

     Fotograf kısmı bitiş -->
    <hr>
    <!-- Footer Kısmı Başlangıç-->

    <?php include 'footer.php'; ?>
    <!-- Footer Kısmı Bitiş -->

    <!-- Bootstrap ve Ek stiller  Başlangıç -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/clean-blog.min.js"></script>
    <!-- Bootstrap ve Ek stiller Bitiş -->
  </body>

  </html>
