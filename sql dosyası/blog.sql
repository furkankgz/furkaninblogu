-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 11 Haz 2020, 16:28:42
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anasayfa`
--

CREATE TABLE `anasayfa` (
  `anasayfa_id` int(11) NOT NULL,
  `anasayfa_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_altbaslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_kisimlarbaslik` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_kisimlarmetin` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_kisimlarbaslik2` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_kisimlarmetin2` text COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_kisimlarbaslik3` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_kisimlarmetin3` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `anasayfa`
--

INSERT INTO `anasayfa` (`anasayfa_id`, `anasayfa_ad`, `anasayfa_baslik`, `anasayfa_altbaslik`, `anasayfa_kisimlarbaslik`, `anasayfa_kisimlarmetin`, `anasayfa_kisimlarbaslik2`, `anasayfa_kisimlarmetin2`, `anasayfa_kisimlarbaslik3`, `anasayfa_kisimlarmetin3`) VALUES
(1, 'Head', 'HOŞGELDİNİZ', 'Furkan\'ın Bloğu', 'YAPABİLECEĞİNE İNAN!', '<p><strong>D&Uuml;Ş&Uuml;NCELERİNİZE KOYDUĞUNUZ SINIRLAR&nbsp;DIŞINDA BAŞARABİLECEKLERİNİZİN SINIRI YOKTUR.</strong></p>\r\n', 'ANI YAKALA', '<p><strong>FOTOĞRAF, GE&Ccedil;MEKTE OLAN GER&Ccedil;EK ANIN YAKALANMASIDIR.</strong></p>\r\n', 'ARAŞTIRMA YAP KENDİNİ GÜNCEL TUT!', '<p><strong>D&Uuml;NYADA HERKESİN BAŞARILI OLABİLECEĞİ BİR İŞ BULUNUR, &Ouml;NEMLİ OLAN İNSANDA&nbsp;BULUNAN YETENEKLERİN ORTAYA &Ccedil;IKARILMASIDIR. HER İNSAN AYRI BİR D&Uuml;NYADIR, HER D&Uuml;NYA İSE YENİ BİR YAŞAMDIR.</strong></p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_url` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_description` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_author` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_facebook` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_google` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_youtube` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_instagram` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_url`, `ayar_title`, `ayar_description`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_mail`, `ayar_facebook`, `ayar_google`, `ayar_youtube`, `ayar_instagram`, `ayar_twitter`) VALUES
(1, 'dimg/26558LogoMakr_8tytq3.png', 'http://www.furkaninblogu.com', 'Furkan\'ın Blogu', 'Kendi dünyama hoşgeldiniz', 'Furkan KORKMAZGÖZ', '05375555555', '08508500000', 'furkan.kgz@gmail.com', 'https://www.facebook.com/furkan.korkmazgoz.14/', 'https://www.google.com', 'https://www.youtube.com', 'https://www.instagram.com/furkan.kgzz/', 'https://www.twitter.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_foto` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `blog_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `blog_kategori` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `blog_url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `blog_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `blog_durum` enum('1','0') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `blog_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `blog_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blog_sira` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_foto`, `blog_ad`, `blog_kategori`, `blog_url`, `blog_seourl`, `blog_durum`, `blog_detay`, `blog_zaman`, `blog_sira`) VALUES
(2, 'dimg/26121ryzen-xt.jpg', 'AMD’den Ryzen XT Serisi İşlemciler Geliyor!', 'Teknoloji', '', 'amd-den-ryzen-xt-serisi-islemciler-geliyor', '1', '<p>AMD ve Intel, &ouml;zellikle son birka&ccedil; haftadır duyurdukları yeni &uuml;r&uuml;nler ile işlemci piyasasını fazlasıyla karıştırdı. AMD&rsquo;nin uygun fiyatlı&nbsp;Ryzen 3 serisi&nbsp;atağına karşılık Intel&nbsp;10. nesil&nbsp;işlemcilerini duyurdu. Buna karşılık AMD cephesi de&nbsp;Ryzen 9 3900X&nbsp;modelinde &ouml;nemli bir indirime gittiğini duyurdu. Yeni ortaya &ccedil;ıkan&nbsp;Ryzen XT&nbsp;serisi ise savaşı &ouml;nemli &ouml;l&ccedil;&uuml;de kızıştıracak!</p>\r\n', '2020-05-24 11:23:51', 1),
(3, 'dimg/24297intel.jpg', 'İlk Intel 7nm İşlemciler ‘Meteor Lake’ Olarak Anılabilir', 'Teknoloji', '', 'ilk-intel-7nm-islemciler-meteor-lake-olarak-anilabilir', '1', '<p>14nm teknolojisini geliştirerek yıllar boyunca kullanan Intel, gelecek planlarını şimdiden yapmaya başlamış g&ouml;r&uuml;n&uuml;yor.</p>\r\n\r\n<p>Intel&rsquo;in 10. nesil masa&uuml;st&uuml; işlemcileri&nbsp;yeni satışa &ccedil;ıkmaya başlamışken&nbsp;yıllar sonrasını konuşmaya başladık bile. Sıradaki 11. nesil işlemci ailesinin&nbsp;Rocket Lake&nbsp;şeklinde isimlendirileceği artık kesin gibi. Hatta yeni satışı başlayan Z490 anakartların bu&nbsp;Rocket Lake-S işlemcilerle uyumlu olacağını duymuştuk.</p>\r\n\r\n<p>Bunun &ouml;tesinde şirketin&nbsp;12. nesil Alder Lake&nbsp;planlarından haberdarız. Bu mimaride tamamen yeni bir tasarım benimsenirken 10nm (10nm+/10nm++) &uuml;retim teknolojisinden yararlanabilirler. Ayrıca ARM big.LITTLE heterojen bir yapılandırmaya benzer şekilde g&uuml;&ccedil;l&uuml; ve d&uuml;ş&uuml;k g&uuml;&ccedil;l&uuml; &ccedil;ekirdekler bir arada tutulacak. B&ouml;ylelikle 16 &ccedil;ekirdeğe kadar destek sunulabilecek.</p>\r\n\r\n<p>Intel&rsquo;in kendi 7nm silikon &uuml;retim s&uuml;recine dayanan ilk m&uuml;şteri sınıfı mikro mimarisi ise &ldquo;Meteor Lake&rdquo; olarak adlandırılacak gibi g&ouml;r&uuml;n&uuml;yor. Kod adı, şimdiden s&uuml;r&uuml;c&uuml; dosyaları ve teknik belgelerde ortaya &ccedil;ıkmaya başladı. Bunlardan birisinin ekran g&ouml;r&uuml;nt&uuml;s&uuml; alındı ve Komachi Ensaka tarafından sızdırıldı.</p>\r\n', '2020-05-24 23:54:35', 2),
(5, 'dimg/24578pacman.jpg', 'Pac-Man, NVIDIA Yapay Zekası İle Yeniden Yaratıldı', 'Oyun', '', 'pac-man-nvidia-yapay-zekasi-ile-yeniden-yaratildi', '1', '<p><strong>NVIDIA GameGAN yapay zekası, Pac-Man oyununu sadece izleyerek kopyaladı.</strong></p>\r\n\r\n<p>Pac-Man&nbsp;40. yıl d&ouml;n&uuml;m&uuml;n&uuml; kutlarken&nbsp;NVIDIA,&nbsp;GameGAN&nbsp;adlı yapay zekasına bu oyunun oynanabilir bir versiyonunu tekrar yaratmayı &ouml;ğretti. Hem de bunu yaparken&nbsp;yapay zeka&nbsp;oyunun kaynak kodundan tek bir satır bile kullanmadı.</p>\r\n\r\n<p>Yapay zeka sadece Pac-Man&rsquo;in oynanışını izleyerek sadece g&ouml;r&uuml;n&uuml;ş&uuml;n&uuml; yansıtmakla kalmadı t&uuml;m işlevlerini, g&uuml;&ccedil;lendiricilerini, hangi alanda hangi hareketlere izin verildiğini ve hayaletlerin davranışlarını da kendi versiyonuna birebir aktarabildi. Sonu&ccedil; m&uuml;kemmel kalitede olmasa da teknolojinin neler yapabileceği anlamında &ouml;nemli bir başarı olarak kabul ediliyor.</p>\r\n\r\n<p>NVIDIA araştırmacısı&nbsp;Seung-Wook Kim, bunun&nbsp;GAN tabanlı n&ouml;ral ağ&nbsp;kullanılarak bir oyun motorunun taklidinin yapılması anlamında ilk araştırma olduğunun altını &ccedil;iziyor. Araştırmada, yapay zekanın sadece izleyerek bir ortamın kurallarını &ouml;ğrenip &ouml;ğrenemediğinin g&ouml;r&uuml;lmek istendiği paylaşılıyor. Ek olarak, yapay zekanın yeni seviye şablonları, karakterler ve hatta oyunlar geliştirme s&uuml;recini hızlandırmak &uuml;zere geliştiricilere yardımcı olabileceği d&uuml;ş&uuml;n&uuml;l&uuml;yor.</p>\r\n\r\n<p>NVIDIA, &ouml;n&uuml;m&uuml;zdeki d&ouml;nemde projesini&nbsp;AI Playground web sayfası&nbsp;&uuml;zerinden herkese a&ccedil;mayı planlıyor.</p>\r\n', '2020-05-26 16:58:49', 3),
(6, 'dimg/30201ps.jpg', 'Sony: “PlayStation 5, PS4’ten 100 Kat Daha Hızlı Olacak”', 'Teknoloji', '', 'sony-playstation-5-ps4-ten-100-kat-daha-hizli-olacak', '1', '<p><strong>PlayStation 5&rsquo;in PlayStation 4&rsquo;ten 100 kat daha hızlı olacağı ileri s&uuml;r&uuml;ld&uuml;.</strong></p>\r\n\r\n<p>Sony, PlayStation 5 ile ilgili yeni detayları oyuncularla paylaşmaya devam ediyor. Hatırlarsanız, daha &ouml;nceden yapılan sızıntılarla beraber PS5 oyunlarının &ouml;n&uuml;m&uuml;zdeki&nbsp;Haziran ayında g&ouml;sterileceği&nbsp;ileri s&uuml;r&uuml;lm&uuml;şt&uuml;. T&uuml;m bunlar yaşanırken bug&uuml;n ise PS5 ile ilgili yeni bir iddia daha ortaya atıldı.</p>\r\n\r\n<p>Tokyo&rsquo;da d&uuml;zenlenen bir toplantı sırasında şirketin CEO&rsquo;su&nbsp;Kenichiro Yoshida&nbsp;tarafınca aktarılan bilgilere g&ouml;re Sony&rsquo;nin sadece oyun &ccedil;&ouml;z&uuml;n&uuml;rl&uuml;klerinin yanı sıra oyunların hızını da ciddi oranda artıracağını belirtti.</p>\r\n\r\n<p>Bununla birlikte PS5&rsquo;te yer alacak olan y&uuml;ksek hızlı SSD&rsquo;ye de değinen şirketin CEO&rsquo;su, bu sayede PS5&rsquo;in PS4&rsquo;ten yaklaşık olarak 100 kat daha hızlı işlem yapabildiğini de ileri s&uuml;rd&uuml;. B&ouml;ylece oyunlardaki y&uuml;kleme s&uuml;relerinin &ccedil;ok daha kısalacağını m&uuml;jdeleyen CEO, bu kısımda ise oyuncuları bambaşka bir konsol deneyimi beklediğine de &ouml;zellikle dikkat &ccedil;ekti.</p>\r\n', '2020-05-26 17:03:12', 4),
(7, 'dimg/26362huawei.jpg', 'Huawei MatePad Pro – Öne Çıkan Özellikler', 'Teknoloji', '', 'huawei-matepad-pro-one-cikan-ozellikler', '1', '<p><strong>Huawei&rsquo;nin Kirin 990 platformunu kullanan 10.8 in&ccedil;lik Huawei MatePad Pro neler sunuyor?</strong></p>\r\n\r\n<p>Huawei MatePad Pro kompakt yapısıyla ergonomik a&ccedil;ıdan başarılı denebilir, tableti elde tutması kolay ve bu sayede kullanımda bileğiniz kolay kolay yorulmuyor. Tabletin &uuml;st ve alt kısımlarında ikişer adet olmak &uuml;zere, 4 adet Harman/Kardon tasarımı hoparl&ouml;r bulunuyor.</p>\r\n\r\n<p>MatePad Pro, 4 mm inceliğinde &ccedil;er&ccedil;evelere sahip ve bu sayede formu k&uuml;&ccedil;&uuml;k olmasına rağmen ekran boyutu neredeyse 11 in&ccedil;&rsquo;e ulaşabilmiş. Yatay durumda sol &uuml;st, dikey durumda ise sağ &uuml;stte yer alan kamera deliğinde 8 MP &ouml;z&ccedil;ekim kamerası bulunuyor. Bu kamera sayesinde g&ouml;r&uuml;nt&uuml;l&uuml; aramaları cevaplayabiliyor ve video konferanslara katılabiliyorsunuz.</p>\r\n\r\n<p>Kirin 990 ile En G&uuml;&ccedil;l&uuml; Android Tablet</p>\r\n\r\n<p>Bu tablet Android 10 ve EMIU 10 ile geliyor, bu da &Ccedil;oklu Ekran İş birliği &ouml;zelliğini desteklediği anlamına geliyor. MatePad&rsquo;in &uuml;st men&uuml;s&uuml;nden kolayca aktif edebildiğiniz bu &ouml;zellik sayesinde, telefonunuzu tıpkı MateBook modellerinde olduğu gibi bu kez tablet &uuml;zerinden kontrol edebiliyorsunuz. Tabletiniz ve diğer cihazlar arasında veri aktarmak istediğinizde, Huawei Share &ouml;zelliğini kullanarak kolayca bunu ger&ccedil;ekleştirebiliyorsunuz.</p>\r\n\r\n<p>Diğer taraftan APP Multiplier &ouml;zelliği sayesinde desteklenen uygulamalarda ekran eğer yatay bi&ccedil;imdeyse, uygulama sekmeleri farklı pencelerde değil aynı ekran &uuml;zerinde g&ouml;steriliyor. B&ouml;ylece Wattpad ve Huawei Sağlık gibi uygulamalarda &ccedil;ok daha iyi bir kullanım deneyimi sağlanmış oluyor.</p>\r\n\r\n<p>Huawei AppGallery şu anda d&uuml;nyanın en b&uuml;y&uuml;k &uuml;&ccedil;&uuml;nc&uuml; uygulama marketi konumunda ve T&uuml;rkiye&rsquo;deki yerel uygulamaların bir&ccedil;oğu burada yer alıyor. Eksik olan uygulamaları ise MoreApps ile kolayca APK olarak indirebilir ve cihazda kullanmaya başlayabilirsiniz. Ayrıca Phone Clone uygulaması &uuml;zerinden eski cihazlarınızdaki verileri kolayca MatePad Pro&rsquo;ya y&uuml;kleyebilirsiniz.</p>\r\n', '2020-05-26 17:21:33', 5),
(8, 'dimg/210556.jpg', 'WhatsApp iOS için QR Kod İle Kişi Ekleme Özelliği Geliyor', 'Mobil', '', 'whatsapp-ios-icin-qr-kod-ile-kisi-ekleme-ozelligi-geliyor', '1', '<p><strong>WhatsApp, QR Kod ile kişi ekleme &ouml;zelliğini iOS kullanıcıları i&ccedil;in test ediyor.</strong></p>\r\n\r\n<p>Son yayınlanan g&uuml;ncelleme ile beraber grup video g&ouml;r&uuml;şmelerindeki kişi sınırını sekiz kişiye&nbsp;&ccedil;ıkartan&nbsp;WhatsApp&rsquo;ın şimdi de yeni kişi ekleme &ouml;zelliği &uuml;zerinde &ccedil;alıştığı ortaya &ccedil;ıktı. WABetaInfo&rsquo;ya g&ouml;re&nbsp;WhatsApp QR kod ile kişi ekleme&nbsp;&ouml;zelliğini&nbsp;iOS&nbsp;kullanıcıları i&ccedil;in test ettiğini g&ouml;r&uuml;yoruz.</p>\r\n\r\n<p>Hatırlarsanız, ge&ccedil;tiğimiz yıl Temmuz ayında yayınlanan rapor ile beraber WhatsApp&rsquo;ın Android kullanıcıları i&ccedil;in test ettiği yeni &ouml;zellik g&uuml;n y&uuml;z&uuml;ne &ccedil;ıkartılmıştı. WhatsApp&rsquo;ın&nbsp;Android 2.19.189 beta&nbsp;g&uuml;ncellemesiyle tespit edilen &ouml;zellik sayesinde, kullanıcıların QR kodlar yardımıyla yeni kişileri hızlı bir şekilde rehberlerine ekleyebilecekleri belirtilmişti.</p>\r\n\r\n<p>Bug&uuml;n ise&nbsp;WABetaInfo&nbsp;tarafınca servis edilen bilgilere g&ouml;re, bahsi ge&ccedil;en bu &ouml;zelliğin şimdi de WhatsApp iOS i&ccedil;in test edildiğini g&ouml;rmekteyiz. Şimdilik halihazırda iOS beta kullanıcılarının erişim sağlayabildiği bu &ouml;zellik sayesinde, kullanıcılar daha &ouml;nceden belirtildiği gibi QR kodlar ile beraber herhangi bir ek işlem yapmadan yeni kişileri rahat bir şekilde rehberlerine ekleyebilecekler.</p>\r\n\r\n<p>Aynı zamanda s&ouml;z konusu bu QR kodları başka kullanıcılar ile paylaşabileceğimize de &ouml;zellikle dikkat &ccedil;eken WABetaInfo, bu QR kodun kullanımını sınırlayabileceğimizi de belirtiyor. Bunun yanı sıra yanlış kişilerle paylaşılan QR kodlar i&ccedil;in de bir takım &ouml;nlemler alan WhatsApp&rsquo;ın bu kısımda ise kullanıcılara en baştan QR kod oluşturmasına olanak sağlayacağını da g&ouml;rmekteyiz. Bu sayede telefon numaranızın başka kişilerin eline ge&ccedil;mesi de engellenmiş olacak.</p>\r\n\r\n<p>Şimdilik, halihazırda iOS beta kullanıcılarının erişim sağlayabildiği bu &ouml;zelliğin tam olarak ne zaman yayınlanacağı bilinmiyor. Ancak şirkete yakın kaynaklarca elde edilen bilgilere g&ouml;re bahsi ge&ccedil;en &ouml;zelliğin en kısa s&uuml;re i&ccedil;erisinde hem iOS hem de Android kullanıcıları i&ccedil;in yayınlanması bekleniyor.</p>\r\n', '2020-05-26 17:26:05', 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogfoto`
--

CREATE TABLE `blogfoto` (
  `blogfoto_id` int(11) NOT NULL,
  `blogfoto_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `blogfoto_resimyol` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `blogfoto_sira` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `blogfoto`
--

INSERT INTO `blogfoto` (`blogfoto_id`, `blogfoto_ad`, `blogfoto_resimyol`, `blogfoto_sira`) VALUES
(40, '', 'dimg/4.jpg', 1),
(41, '', 'dimg/2.jpg', 2),
(42, '', 'dimg/8.jpg', 3),
(44, '', 'dimg/1.jpg', 6),
(45, '', 'dimg/9.jpg', 5),
(46, '', 'dimg/10.jpg', 7),
(47, '', 'dimg/6.jpg', 8),
(48, '', 'dimg/11.jpg', 9),
(49, '', 'dimg/12.jpg', 11);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_icerik` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`) VALUES
(1, 'Hayal Edebiliyorsan Yapabilirsin.', '<p><strong><big>Merhabalar</big>, ben Furkan KORKMAZG&Ouml;Z. İstanbul Esenyurt &Uuml;niversitesi Bilgisayar Programcılığı 2. sınıf &ouml;ğrencisiyim. 2 yıldır yazılımla i&ccedil; i&ccedil;eyim fakat teknolojiye olan merakım &ccedil;ocukluğumdan bu yana hi&ccedil; eksilmedi. Her ge&ccedil;en g&uuml;n kendimi&nbsp;bu sekt&ouml;rde geliştirmek, yeni bir şeyler &ouml;ğrenmek i&ccedil;in &ccedil;alışıyorum. Yapmış olduğum blog sitesi de bunlardan bir tanesi. Hem kendim i&ccedil;in bir site yapmak, hem de şu ana kadar nereye kadar gelebildiğimi, neler yapabildiğimi ortaya koyduğum keyifli bir proje&nbsp;oldu.</strong></p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL,
  `kullanici_resim` int(11) NOT NULL,
  `kullanici_adsoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_resim`, `kullanici_adsoyad`, `kullanici_mail`, `kullanici_password`, `kullanici_yetki`, `kullanici_durum`) VALUES
(1, '2020-04-21 23:12:07', 0, 'Furkan KORKMAZGÖZ', 'admin', '123', '5', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `menu_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `menu_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `menu_url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `menu_sira` int(2) NOT NULL,
  `menu_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `menu_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_seourl`) VALUES
(1, '', 'Blog', '', 'blog', 2, '1', 'blog'),
(2, '', 'Hakkında', '', 'hakkinda', 5, '1', 'hakkinda'),
(4, '', 'Galeri', '', 'galeri', 4, '1', 'galeri');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `anasayfa`
--
ALTER TABLE `anasayfa`
  ADD PRIMARY KEY (`anasayfa_id`);

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Tablo için indeksler `blogfoto`
--
ALTER TABLE `blogfoto`
  ADD PRIMARY KEY (`blogfoto_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `anasayfa`
--
ALTER TABLE `anasayfa`
  MODIFY `anasayfa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `ayar`
--
ALTER TABLE `ayar`
  MODIFY `ayar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `blogfoto`
--
ALTER TABLE `blogfoto`
  MODIFY `blogfoto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `hakkimizda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
