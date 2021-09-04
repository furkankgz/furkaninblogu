<?php  
ob_start();
session_start();

include 'baglan.php'; // veritabanını bağladığım kod
include '../production/fonksiyon.php';


if (isset($_POST['admingiris'])) { // panele giriş butonunda tetiklenen kısım

	$kullanici_mail=$_POST['kullanici_mail']; 
	$kullanici_password=($_POST['kullanici_password']);
	// veritabanındaki kullanici mail ve passwordu sayfa ile ilişkilendirdim
	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5
	));
	//yetki 5 admin / yetki 1 kullanıcı
	echo $say=$kullanicisor->rowCount();

	if ($say==1) { // eğer veriler doğruysa panele gönder

		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
		exit;



	} else { // değilse login sayfasında kal
		header("Location:../production/login.php?durum=no");
		exit;
	}

}


if (isset($_POST['genelayarkaydet'])) {	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_author=:ayar_author
		WHERE ayar_id=1");
	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_author' => $_POST['ayar_author']
	));
	if ($update) {
		header("Location:../production/genel-ayar.php?durum=ok");
	} else {
		header("Location:../production/genel-ayar.php?durum=no");
	}
}

if (isset($_POST['sosyalayarkaydet'])) {	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_instagram=:ayar_instagram,
		ayar_google=:ayar_google,
		ayar_youtube=:ayar_youtube
		WHERE ayar_id=1");
	$update=$ayarkaydet->execute(array(
		'ayar_facebook' => $_POST['ayar_facebook'],
		'ayar_twitter' => $_POST['ayar_twitter'],
		'ayar_instagram' => $_POST['ayar_instagram'],
		'ayar_google' => $_POST['ayar_google'],
		'ayar_youtube' => $_POST['ayar_youtube']
	));
	if ($update) {
		header("Location:../production/sosyal-ayarlar.php?durum=ok");
	} else {
		header("Location:../production/sosyal-ayarlar.php?durum=no");
	}
}

if (isset($_POST['iletisimayarkaydet'])) {	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_mail=:ayar_mail
		WHERE ayar_id=1");
	$update=$ayarkaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_gsm' => $_POST['ayar_gsm'],
		'ayar_mail' => $_POST['ayar_mail']
	));
	if ($update) {
		header("Location:../production/iletisim-ayarlar.php?durum=ok");
	} else {
		header("Location:../production/iletisim-ayarlar.php?durum=no");
	}
}


if (isset($_POST['menukaydet'])) { // Navbara menu eklemeye yarayan kod


	$menu_seourl=seo($_POST['menu_ad']);


	$ayarekle=$db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		");

	$insert=$ayarekle->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
	));


	if ($insert) {

		Header("Location:../production/menu.php?durum=ok");

	} else {

		Header("Location:../production/menu.php?durum=no");
	}

}

if (isset($_POST['menuduzenle'])) { //navbar kısmındaki menüleri düzenlemye yarayan kod

	$menu_id=$_POST['menu_id'];

	$menu_seourl=seo($_POST['menu_ad']);

	
	$ayarkaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		WHERE menu_id={$_POST['menu_id']}");

	$update=$ayarkaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
	));


	if ($update) {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");

	} else {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
	}

}

if(isset($_GET['menusil'])){
	if ($_GET['menusil']=="ok") { // navbar kısmındaki menuleri silmeye yarayan kod

		$sil=$db->prepare("DELETE from menu where menu_id=:id");
		$kontrol=$sil->execute(array(
			'id' => $_GET['menu_id']
		));


		if ($kontrol) {


			header("location:../production/menu.php?sil=ok");


		} else {

			header("location:../production/menu.php?sil=no");

		}


	}
}

if (isset($_POST['hakkimizdakaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik
		WHERE hakkimizda_id=1");

	$update=$ayarkaydet->execute(array(
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik']
	));


	if ($update) {

		header("Location:../production/hakkimizda.php?durum=ok");

	} else {

		header("Location:../production/hakkimizda.php?durum=no");
	}
	
}

if (isset($_POST['kategoriekle'])) { // paylaşılan blogun hangi kategoride olduğunu göstermek için kullandığımız kategoriler kısmının kategori ekleme kodu

	$kategori_seourl=seo($_POST['kategori_ad']);

	
	$ayarkaydet=$db->prepare("INSERT INTO kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,
		kategori_sira=:kategori_sira
		");

	$insert=$ayarkaydet->execute(array(
		'ad' => $_POST['kategori_ad'],
		'kategori_sira' => $_POST['kategori_sira'],
		'kategori_durum' => $_POST['kategori_durum']
	));


	if ($insert) {

		Header("Location:../production/kategori.php?durum=ok");

	} else {

		Header("Location:../production/kategori.php?durum=no");
	}

}

if (isset($_POST['kategoriduzenle'])) { // kategorinin adını sırasını ve kategorisini düzenlediğimiz kod

	$kategori_id=$_POST['kategori_id'];

	$kategori_seourl=seo($_POST['kategori_ad']);

	
	$ayarkaydet=$db->prepare("UPDATE kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,
		kategori_seourl=:kategori_seourl,
		kategori_sira=:kategori_sira
		WHERE kategori_id={$_POST['kategori_id']}");

	$update=$ayarkaydet->execute(array(
		'ad' => $_POST['kategori_ad'],
		'kategori_sira' => $_POST['kategori_sira'],
		'kategori_seourl' => $kategori_seourl,
		'kategori_durum' => $_POST['kategori_durum']
	));


	if ($update) {

		Header("Location:../production/kategori-duzenle.php?kategori_id=$kategori_id&durum=ok");

	} else {

		Header("Location:../production/kategori-duzenle.php?kategori_id=$kategori_id&durum=no");
	}

}

if(isset($_GET['kategorisil'])){ // kategoriyi silme kodu
	if ($_GET['kategorisil']=="ok") {

		$sil=$db->prepare("DELETE from kategori where kategori_id=:id");
		$kontrol=$sil->execute(array(
			'id' => $_GET['kategori_id']
		));


		if ($kontrol) {


			header("location:../production/kategori.php?sil=ok");


		} else {

			header("location:../production/kategori.php?sil=no");

		}
	}
}

if (isset($_POST['blogkaydet'])) { // Blog ekleme


	$blog_seourl=seo($_POST['blog_ad']);


	$ayarekle=$db->prepare("INSERT INTO blog SET
		blog_ad=:blog_ad,
		blog_kategori=:blog_kategori,
		blog_detay=:blog_detay,
		blog_url=:blog_url,
		blog_sira=:blog_sira,
		blog_seourl=:blog_seourl,
		blog_durum=:blog_durum
		");

	$insert=$ayarekle->execute(array(
		'blog_ad' => $_POST['blog_ad'],
		'blog_kategori' => $_POST['blog_kategori'],
		'blog_detay' => $_POST['blog_detay'],
		'blog_url' => $_POST['blog_url'],
		'blog_sira' => $_POST['blog_sira'],
		'blog_seourl' => $blog_seourl,
		'blog_durum' => $_POST['blog_durum']
	));


	if ($insert) {

		Header("Location:../production/blog.php?durum=ok");

	} else {

		Header("Location:../production/blog.php?durum=no");
	}

}

if (isset($_POST['blogduzenle'])) {

	$blog_id=$_POST['blog_id'];
	$blog_seourl=seo($_POST['blog_ad']);

	$kaydet=$db->prepare("UPDATE blog SET
		blog_ad=:blog_ad,
		blog_kategori=:blog_kategori,
		blog_detay=:blog_detay,
		blog_url=:blog_url,
		blog_sira=:blog_sira,
		blog_seourl=:blog_seourl,
		blog_durum=:blog_durum	
		WHERE blog_id={$_POST['blog_id']}");
	$update=$kaydet->execute(array(
		'blog_ad' => $_POST['blog_ad'],
		'blog_kategori' => $_POST['blog_kategori'],
		'blog_detay' => $_POST['blog_detay'],
		'blog_url' => $_POST['blog_url'],
		'blog_sira' => $_POST['blog_sira'],
		'blog_seourl' => $blog_seourl,
		'blog_durum' => $_POST['blog_durum']

	));

	if ($update) {

		Header("Location:../production/blog-duzenle.php?durum=ok&blog_id=$blog_id");

	} else {

		Header("Location:../production/blog-duzenle.php?durum=no&blog_id=$blog_id");
	}

}

if(isset($_GET['blogsil'])){
	if ($_GET['blogsil']=="ok") { // blog sayfasındaki kısmındaki makaleleri silmeye yarayan kod

		$sil=$db->prepare("DELETE from blog where blog_id=:id");
		$kontrol=$sil->execute(array(
			'id' => $_GET['blog_id']
		));


		if ($kontrol) {


			header("location:../production/blog.php?sil=ok");


		} else {

			header("location:../production/blog.php?sil=no");

		}


	}
}

if (isset($_POST['logoduzenle'])) {

	

	$uploads_dir = '../../dimg';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=1");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
	));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		Header("Location:../production/genel-ayar.php?durum=no");
	}

}


if(isset($_GET['blogfotosil'])){
	if ($_GET['blogfotosil']=="ok") { // navbar kısmındaki blogleri silmeye yarayan kod

		$sil=$db->prepare("DELETE from blogfoto where blogfoto_id=:id");
		$kontrol=$sil->execute(array(
			'id' => $_GET['blogfoto_id']
		));


		if ($kontrol) {


			header("location:../production/galeri.php?sil=ok");


		} else {

			header("location:../production/galeri.php?sil=no");

		}


	}
}

if (isset($_POST['anasayfaduzenle'])) { //anasayfayı düzenlemeye yarayan kod

	$anasayfa_id=$_POST['anasayfa_id'];

	
	$ayarkaydet=$db->prepare("UPDATE anasayfa SET
		anasayfa_ad=:anasayfa_ad,
		anasayfa_baslik=:anasayfa_baslik,
		anasayfa_altbaslik=:anasayfa_altbaslik,
		anasayfa_kisimlarbaslik=:anasayfa_kisimlarbaslik,
		anasayfa_kisimlarmetin=:anasayfa_kisimlarmetin,
		anasayfa_kisimlarbaslik2=:anasayfa_kisimlarbaslik2,
		anasayfa_kisimlarmetin2=:anasayfa_kisimlarmetin2,
		anasayfa_kisimlarbaslik3=:anasayfa_kisimlarbaslik3,
		anasayfa_kisimlarmetin3=:anasayfa_kisimlarmetin3
		WHERE anasayfa_id={$_POST['anasayfa_id']}");

	$update=$ayarkaydet->execute(array(
		'anasayfa_ad' => $_POST['anasayfa_ad'],
		'anasayfa_baslik' => $_POST['anasayfa_baslik'],
		'anasayfa_altbaslik' => $_POST['anasayfa_altbaslik'],
		'anasayfa_kisimlarbaslik' => $_POST['anasayfa_kisimlarbaslik'],
		'anasayfa_kisimlarmetin' => $_POST['anasayfa_kisimlarmetin'],
		'anasayfa_kisimlarbaslik2' => $_POST['anasayfa_kisimlarbaslik2'],
		'anasayfa_kisimlarmetin2' => $_POST['anasayfa_kisimlarmetin2'],
		'anasayfa_kisimlarbaslik3' => $_POST['anasayfa_kisimlarbaslik3'],
		'anasayfa_kisimlarmetin3' => $_POST['anasayfa_kisimlarmetin3'],

	));


	if ($update) {

		Header("Location:../production/anasayfa-duzenle.php?anasayfa_id=$anasayfa_id&durum=ok");

	} else {

		Header("Location:../production/anasayfa-duzenle.php?anasayfa_id=$anasayfa_id&durum=no");
	}

}
if (isset($_POST['fotoekle'])) {

	

	$uploads_dir = '../../dimg';

	@$tmp_name = $_FILES['blog_foto']["tmp_name"];
	@$name = $_FILES['blog_foto']["name"];
	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
	$blog_id=$_POST['blog_id'];

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE blog SET
		blog_foto=:blog_foto
		WHERE blog_id={$_POST['blog_id']}");
	$update=$duzenle->execute(array(
		'blog_foto' => $refimgyol
	));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/resim-duzenle.php?&durum=ok&blog_id=$blog_id");

	} else {

		Header("Location:../production/resim-duzenle.php?&durum=no&blog_id=blog_id");
	}

}

if(isset($_POST['blogfotokaydet'])){ //Dosya tanımlanmış mı
	$hata = $_FILES['blogfoto_resimyol']['error']; 
   if($hata != 0) { //Upload sırasında hata var mı
   	echo 'Yükleme sırasında hata oluştu.';
   } else {
   	$boyut = $_FILES['blogfoto_resimyol']['size'];
      if($boyut > (1024*1024*5)){ //Dosya boyutu 100 kb dan büyük mü
      	echo 'Dosya 5mb den büyük olamaz.';
      } else {
         $tip = $_FILES['blogfoto_resimyol']['type']; //Dosyanın tipi
         $isim = $_FILES['blogfoto_resimyol']['name']; //Dosyanın ismi
         $uzanti = explode('.', $isim); 
         $uzanti = $uzanti[count($uzanti)-1]; //Dosya isminden uzantiyi aldik
         if($tip != 'image/jpeg' || $uzanti != 'jpg') { //Tipi resim ve uzantısı jpg değilse
         	echo 'Sadece JPG türünde dosyaları gönderebilirsiniz.';
         } else {
            $gecicidosya= $_FILES['blogfoto_resimyol']['tmp_name']; //Dosyanın geçici tutulduğu yer
            copy($gecicidosya, '../../dimg/' . $_FILES['blogfoto_resimyol']['name']); //Geçici dosyayı koplaya
            $yeniyer='dimg/' .$_FILES['blogfoto_resimyol']['name'];
            $kaydet=$db->prepare("INSERT INTO blogfoto SET
            	blogfoto_resimyol=:blogfoto_resimyol,
            	blogfoto_ad=:blogfoto_ad,
            	blogfoto_sira=:blogfoto_sira
            	");
            $insert=$kaydet->execute(array(
            	'blogfoto_resimyol' => $yeniyer,
            	'blogfoto_ad' => $_POST['blogfoto_ad'],
            	'blogfoto_sira' => $_POST['blogfoto_sira']
            ));



            if ($insert) {
            	Header("Location:../production/galeri-ekle.php?&durum=ok");

            } else {

            	Header("Location:../production/galeri-ekle.php?&durum=no");
            }
        }
    }
}
}
?>