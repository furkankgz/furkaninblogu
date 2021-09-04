 <div class="container">
    <div class="row justify-content-center">
      <?php while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="col-md-4">
          <div class="card-shadow" style="width: 20rem;">
            <div class="inner">
              <a href="blog-detay?<?php echo $blogcek['blog_seourl'] ?>">
                <img class="card-img-top" src="<?php echo $blogcek['blog_foto'] ?>" alt="">
                </a>  
              </div> 
              <p hidden=""><?php echo $_blogcek['blog_id'] ?></p>
              <div class="card-body text-center">
                <a href="">
                <p class="subheading text-center centered"><?php echo $blogcek['blog_ad'] ?></p></a> 
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>