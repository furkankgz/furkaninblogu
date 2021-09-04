<?php  
include 'nedmin/netting/baglan.php';


?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">

  <div class="container">
    <a class="navbar-brand" href="index.php">FURKAN'IN BLOGU</a>
    <button class="navbar-toggler navbar-toggler-light" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="index">Anasayfa</a></li>
        <?php 
        // menuleri veritabanından çekmek için
        $menusor=$db->prepare("SELECT * FROM menu WHERE menu_durum=:durum ORDER BY menu_sira ASC LIMIT 5");
        $menusor->execute(array(
          'durum' => 1
        ));
        while ($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){ ?>
          <!-- Eğer menu_url boş değilse hrefe url'yi ekle boş işe seo url'sini ekle -->
          <li class="nav-item"><a class="nav-link" href="
            <?php  
            if(!empty($menucek['menu_url'])){
              echo $menucek['menu_url'];
              } else {
                echo "sayfa-".seo($menucek['menu_ad']);
              }
              ?>
              "><?php echo $menucek['menu_ad']; ?></a></li>

            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>