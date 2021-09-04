<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$anasayfasor=$db->prepare("SELECT * FROM anasayfa");
$anasayfasor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Anasayfa Listeleme <small>,

              <?php 
              if(isset($_GET['durum'])){
                if ($_GET['durum']=="ok") {?>

                  <b style="color:green;">İşlem Başarılı...</b>

                <?php } elseif ($_GET['durum']=="no") {?>

                  <b style="color:red;">İşlem Başarısız...</b>

                <?php }
              }
              ?>


            </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="anasayfa-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Anasayfa Ad</th>
                  <th>Head | Sayfa Kısmı İşlemi</th>
                  <th></th>
                 
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($anasayfacek=$anasayfasor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                  <tr>
                   <td width="20"><?php echo $say ?></td>
                   <td><?php echo $anasayfacek['anasayfa_ad'] ?></td>
                   <td><center><a href="anasayfa-duzenle.php?anasayfa_id=<?php echo $anasayfacek['anasayfa_id']; ?>"><button class="btn btn-success btn-xs">Head | Sayfa Kısmı</button></a></center></td>
                   <td><center><a href="../netting/islem.php?anasayfa_id=<?php echo $anasayfacek['anasayfa_id']; ?>&anasayfasil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                 </tr>



               <?php  }

               ?>


             </tbody>
           </table>

           <!-- Div İçerik Bitişi -->


         </div>
       </div>
     </div>
   </div>




 </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
