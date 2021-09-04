<?php  



include 'nedmin/netting/baglan.php'; // veritabanını bağladığı kod


//Belirli veriyi seçme işlemi - ayar tablosu
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 1
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

?>







<footer>
 <div class="container">
  <div class="row">
   <div class="col-lg-8 col-md-10 mx-auto">
    <ul class="list-inline text-center">

     <li class="list-inline-item">
      <a href="<?php echo $ayarcek['ayar_twitter']; ?>"> <!-- ayar tablosundan sosyal medya hesaplarını çeke işlemi -->
       <span class="fa-stack fa-lg">
        <i class="fas fa-circle fa-stack-2x"></i>
        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
      </span>
    </a>
  </li>

  <li class="list-inline-item">
    <a href="<?php echo $ayarcek['ayar_facebook']; ?>">
     <span class="fa-stack fa-lg">
      <i class="fas fa-circle fa-stack-2x"></i>
      <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
    </span>
  </a>
</li>

<li class="list-inline-item">
  <a href="<?php echo $ayarcek['ayar_instagram']; ?>">
   <span class="fa-stack fa-lg">
    <i class="fas fa-circle fa-stack-2x"></i>
    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
  </span>
</a>
</li>
</ul>
<p class="copyright text-muted">Copyright © furkaninblogu.com 2020</p>
</div>
</div>
</div>
</footer>
<!-- Footer Kısmı Bitiş -->
<!-- Bootstrap ve Ek stiller  Başlangıç -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/clean-blog.min.js"></script>
<!-- Bootstrap ve Ek stiller Bitiş -->
</body>

</html>
