<?php  
$vt_sunucu="localhost";
$vt_kullanici="root";
$vt_sifre="";
$vt_adi="phpweb";



$baglan=mysqli_connect($vt_sunucu,$vt_kullanici,$vt_sifre,$vt_adi);

if(!$baglan)
{
    die("Veri Tabanı Bağlanti işleminde hata var.".mysqli_connect_error());
}

    





?>