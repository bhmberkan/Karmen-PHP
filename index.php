<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Ana Sayfa | 2024</title>
    <!--iconlar içinaşşağıdaki scripti kullandık -->
    <script src="https://kit.fontawesome.com/35891a3bf8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

    <!-- aşşağıdaki üç link font için-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">


    <!-- owl carousel i sayfasından bu şekilde çektik yana kaydırma muhabbeti -->
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">


</head>

<body>
    <section id="menu">
        <div id="logo">Karmen</div>
        <nav>
            <a href="#menu"><i class="fa-solid fa-house ikon"></i>Ana sayfa</a>
            <a href="#hakkimizda"><i class="fa-solid fa-info ikon"></i>Hakkımızda</a>
            <a href="#egitimler"><i class="fa-solid fa-graduation-cap ikon"></i>Eğitimler</a>
            <a href="#ekip"><i class="fa-solid fa-people-group ikon"></i>Ekip</a>
            <a href="#iletisim"><i class="fa-solid fa-map-pin ikon"></i>İletişim</a>
            <a href="Panelgiris.php"><i class="fa-solid fa-user-tie ikon"></i>Admin</a>
        </nav>
    </section>

    <section id="anasayfa">
        <div id="black">

        </div>

        <div id="icerik">
<!--
            <h2  name="h2karmen">.</h2>
            <hr width=300px align=left>
            <p  name="karmenalt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque id aliquam dicta praesentium, blanditiis libero ut, fuga laboriosam assumenda, deleniti culpa qui delectus accusantium, repudiandae fugit dolore ullam. Aut, iusto.</p>
-->
<?php 

include("baglanti.php");
            $seç= "SELECT h2karmen,karmenalt FROM adminana";
$sonuc=$baglan->query($seç);
            if($sonuc->num_rows>0)
            {
                while($cek=$sonuc->fetch_assoc())
                {
                    echo " <h2 name='h2karmen'>".$cek['h2karmen']."</h2>";
                    echo " <hr width=300px align=left>";
                    echo " <p name='karmenalt'>".$cek['karmenalt']."</p>";
                }
            }

?>




        </div>
    </section>
    <section id="hakkimizda">

<?php 

include("baglanti.php");
            $seç= "SELECT sol,L,sag,alt FROM adminhakkimizda";
$sonuc=$baglan->query($seç);
            if($sonuc->num_rows>0)
            {
                while($cek=$sonuc->fetch_assoc())
                {
                echo "<h3>Hakkımızda</h3>";
                echo "<div class='conteiner'>";
                    echo " <div id='sol'>";
                        echo " <h5 id='h5sol'>".$cek['sol']."</h5>";
                        echo " </div>";
                    echo " <div id='sag'>";
                        echo " <span id='l'>".$cek['L']."</span>";
                        echo " <p id='psag'>".$cek['sag']."</p>";
                        echo " </div>";
                    echo " <img src='img/about.jpg' alt='' class='imgsekil'>";
                    echo " <p id='pson'>".$cek['alt']."</p>";
                    echo "</div>";
                }
            }

?>
<!--
        <h3>Hakkımızda</h3>
        <div class="conteiner">
            <div id="sol">
                <h5 id="h5sol">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h5>
            </div>
            <div id="sag">
                <span id="l">L</span>
                <p id="psag">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor ex nostrum facilis eveniet doloremque placeat pariatur sint ea, nulla molestias illo, itaque numquam esse beatae suscipit, aliquam, reiciendis fuga officia?</p>
            </div>
            <img src="img/about.jpg" alt="" class="imgsekil ">
            <p id="pson">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus sint iusto, inventore eos laborum aliquid enim quia ex accusamus eaque soluta dolores reprehenderit libero repudiandae eveniet consequatur cum nulla est.</p>
        </div>
-->
    </section>

    <section id="egitimler">
        <div class="conteiner">

            <h3>Egitimler</h3>

            <!--owl carousel i indirip sayfaya bağlıyoruz 
            cardlarda yana kaydırma işlemi için-->

            <div class="owl-carousel owl-theme">
<?php
include("baglanti.php");
                
                
//$egitimid=1;
//eğer buraya wgere id=egitimid; dersem kaç tane div oluşturursam o kadar veri tabanından veri çekebilirim ancak burada doğrudan çekme işlemi yapıyorum 
//veri tabanında kaç tane veri varsa onlar için div oluşturup içini dolduracak direkt
                 $seç= "SELECT baslik,icyazi FROM adminegitimler ";
                 $sonuc=$baglan->query($seç);
                 if($sonuc->num_rows>0)
                 {
                 while($cek=$sonuc->fetch_assoc())
                 {
                 echo "
                 <div class='card item' data-merge=1.5>
                     <img src='img/r2.jpg' alt='' class='imgsekil'>
                     <h5 class='baslikcard'>".$cek['baslik']."</h5>
                     <p class='cardp'>".$cek['icyazi']."</p>
                 </div>" ;

                 }
                 }
                

?>


<br> <br>
                
<!--
                <div class="card item" data-merge=1.5>
                    <img src="img/r2.jpg" alt="" class="imgsekil">
                    <h5 class="baslikcard">Html5 ve css3</h5>
                    <p class="cardp">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae dicta </p>
                </div>
-->

<!--
                <div class="card item" data-merge=1.5>
                    <img src="img/r2.jpg" alt="" class="imgsekil">
                    <h5 class="baslikcard">Html5 ve css3</h5>
                    <p class="cardp">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae dicta </p>
                </div>
-->
                
                
                
<!--

                <div class="card item" data-merge=1.5>
                    <img src="img/r2.jpg" alt="" class="imgsekil">
                    <h5 class="baslikcard">Html5 ve css3</h5>
                    <p class="cardp">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae dicta </p>
                </div>
                <br><br>
-->

               


            </div>

        </div>
    </section>

<br> <br> <br> <br> <br>
    <section id="ekip">
        <div class="conteiner">
            <h3 id="ekiph3">Ekip</h3>
<?php // bu kısımları es geçtik istediğimiz gibi olmadı/ ekip üyeleri de zaten belirli projeler için kalıp olarak kalacak
//include("baglanti.php");
//$adminid=1;
//            $seç= "SELECT baslik,yazi FROM adminekip WHERE id=$adminid";
//$sonuc=$baglan->query($seç);
//            if($sonuc->num_rows>0)
//            {
//                while($cek=$sonuc->fetch_assoc())
//                {
//
//         echo "   <div class='sutun-sol-sag'>
//                <img src='img/ekip3.jpg' alt='' class='imgsekil oval'>
//                <h4 class='ekipisim'>".$cek['baslik']."</h4>
//                <p class='ekipp'>".$cek['yazi']."</p>
//                <div class='ekip-ikon'>
//                    <a href='#'><i class='fa-brands fa-facebook social'></i></a>
//                    <a href='#'><i class='fa-brands fa-instagram social'></i></a>
//                    <a href='#'><i class='fa-brands fa-twitter social'></i></a>
//                </div>"; 
//
//                }
//            }
//           // bu kısımda patladık
////include("baglanti.php");
////$adminid=4;
////            $seç= "SELECT baslik,yazi FROM adminekip WHERE id=$adminid";
////$sonuc=$baglan->query($seç);
////            if($sonuc->num_rows>0)
////            {
////                while($cek=$sonuc->fetch_assoc())
////                {
////
////         echo "   <div class='sutun-orta'>
////                <img src='img/ekip3.jpg' alt='' class='imgsekil oval'>
////                <h4 class='ekipisim'>".$cek['baslik']."</h4>
////                <p class='ekipp'>".$cek['yazi']."</p>
////                <div class='ekip-ikon'>
////                    <a href='#'><i class='fa-brands fa-facebook social'></i></a>
////                    <a href='#'><i class='fa-brands fa-instagram social'></i></a>
////                    <a href='#'><i class='fa-brands fa-twitter social'></i></a>
////                </div>"; 
////
////                }
////            }
//           
?>



          <div class="sutun-sol-sag">
              <img src="img/ekip3.jpg" alt="" class="imgsekil oval">
              <h4 class="ekipisim">Berkan T</h4>
              <p class="ekipp">Berkan Burak Turgut samsun zonguldak ve harran ünv okudu.
              </p>
              <div class="ekip-ikon">
                  <a href="#"><i class="fa-brands fa-facebook social"></i></a>
                  <a href="#"><i class="fa-brands fa-instagram social"></i></a>
                  <a href="#"><i class="fa-brands fa-twitter social"></i></a>
              </div>


          </div>

          <div class="sutun-orta">
              <img src="img/ekip3.jpg" alt="" class="imgsekil oval">
              <h4 class="ekipisim">Berkan T</h4>
              <p class="ekipp">genel bir açıklama olabilir on kelime olsun falan filan işte
              </p>
              <div class="ekip-ikon">
                  <a href="#"><i class="fa-brands fa-facebook social"></i></a>
                  <a href="#"><i class="fa-brands fa-instagram social"></i></a>
                  <a href="#"><i class="fa-brands fa-twitter social"></i></a>
              </div>

          </div>

          <div class="sutun-sol-sag">
              <img src="img/ekip3.jpg" alt="" class="imgsekil oval">
              <h4 class="ekipisim">Berkan T</h4>
              <p class="ekipp">genel bir açıklama olabilir on kelime olsun falan filan işte
              </p>
              <div class="ekip-ikon">
                  <a href="#"><i class="fa-brands fa-facebook social"></i></a>
                  <a href="#"><i class="fa-brands fa-instagram social"></i></a>
                  <a href="#"><i class="fa-brands fa-twitter social"></i></a>
              </div>

          </div>


          </div>
          </section>



    <section id="iletisim">


        <div class="container">

            <h3 id="h3iletisim">İletişim</h3>

            <form action="index.php" method="post">
                <div id="ilteisim-opak">

                    <div id="form-group">
                        <div id="sol-form">
                            <input type="text" name="isim" placeholder="Ad Soyad" required class="form-control">
                            <input type="text" name="tel" placeholder="Telefon Numarası" required class="form-control">
                        </div>
                        <div id="sag-form">
                            <input type="email" name="mail" placeholder="Email adresiniz" required class="form-control">
                            <input type="text" name="konu" placeholder="Konu Başlığı" required class="form-control">

                        </div>

                        <textarea name="mesaj" cols="30" rows="10" placeholder="Mesaj Giriniz." required class="form-control"></textarea>

                        <input type="submit" value="Gönder">
                    </div>
                    <div id="adres">
                        <h4 id="adresbaslik"> Adres: </h4>
                        <p class="adresp">Adıyaman/Merkez</p>
                        <p class="adresp">30 ağustos cad.</p>
                        <p class="adresp">cumhuriyet mah no:2</p>
                        <p class="adresp">505 988 46 77</p>
                        <p class="adresp">Email: berkanburakturgut@gmail.com</p>
                    </div>

                </div>
            </form>

            <footer>
                <div id="copy-right">2024 | tüm hakları saklıdır.</div>
                <div id="social-footer">
                    <a href="https://www.facebook.com/bhmberkan?locale=tr_TR"><i class="fa-brands fa-facebook social"></i></a>
                    <a href="https://www.instagram.com/bhmberkan/"><i class="fa-brands fa-instagram social"></i></a>
                    <a href="https://twitter.com/bhmberkan"><i class="fa-brands fa-twitter social"></i></a>
                </div>

                <a href="#menu"><i class="fa-solid fa-angle-up" id="up"></i></a>

            </footer>

        </div>

    </section>







    <!--jquery bağlantısı için jquery cdn e girdik 3x teki slim minified kısmına tıklayıp link aldık -->

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

    <script src="owl/script.js"></script>

    <script src="owl/owl.carousel.min.js"></script>

</body>

</html>



<?php

include("baglanti.php");

if(isset($_POST["isim"],$_POST["tel"],$_POST["mail"],$_POST["konu"],$_POST["mesaj"]))

{
    $adsoyad=$_POST["isim"];
    $telefon=$_POST["tel"];
    $email=$_POST["mail"];
    $konu=$_POST["konu"];
    $mesaj=$_POST["mesaj"];
    
    $ekle="INSERT INTO iletisim( adsoyad, telefon, email, konu, mesaj) VALUES ('".$adsoyad."','".$telefon."','".$email."','".$konu."','".$mesaj."')";

    if($baglan->query($ekle)==TRUE)
    {
        echo"<script>alert('Mesajınız Başarı ile Gönderilmiştir.')</script>";
    }
    else
    {
        echo"<script>alert('Mesajınız Gönderilirken Bir hata oluştu.')</script>";
    }

}




?>
