<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #445c6e;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="css/button.css">
    
</head>

<body>

    <h1>Safya Verileri</h1>
    <!-- index.php -->
    <form method="post" action="#">
      
            <table id="customers">
                <tr>
                    <th class="h2kar">h2 Karmen</th>
                    <th class="karmenalt">Karmen alt</th>
                </tr>

                <?php
        session_start();
        if ($_SESSION["user"] == "") {
            echo "<script>window.location.href='cikis.php'</script>";
        } else {
            echo "Kullanıcı Adınız : " . $_SESSION['user'] . "<br>";
            echo "<a href='cikis.php'>ÇIKIŞ YAP</a><br><br>";
            include("baglanti.php");

            $seç = "SELECT * FROM adminana";
            $sonuc = $baglan->query($seç);
            if ($sonuc->num_rows > 0) {
                // satır sayısı sıfırdan büyükse
                while ($cek = $sonuc->fetch_assoc()) {
                    // Güncellenecek satırları input alanlarına dönüştür
                    echo "<tr>";
                    echo "<td><input type='text' class='h2kar' contenteditable='true' oninput='limitLength(this, 15)' name='h2karmen' value='" . $cek['h2karmen'] . "'></td>";
                    echo "<td><input type='text' class='karmenalt' contenteditable='true' oninput='limitLength(this, 250)' name='karmenalt' value='" . $cek['karmenalt'] . "'></td>";
                    echo "</tr>";
                 
                }
            } else {
                echo "Veri tabanında Hiçbir veri bulunamadı.";
            }
        }
   echo"</table>";

echo "<br><br>";

echo "<table id='customers'>
            <tr><th class='haksol'>sol</th>
            <th class='hakharf'>Harf</th>
            <th class='haksag'>sag</th>
            <th class='hakalt'>alt</th>
            </tr>";
$seç2="SELECT * FROM adminhakkimizda";
$sonuc2=$baglan->query($seç2);
if($sonuc2->num_rows>0)
{ // satır sayısı sıfırdan büyükse
    while($cek2=$sonuc2->fetch_assoc())
    {
        echo "<tr>";
        // Her bir değer için bir input alanı oluşturuluyor
        echo "<td class='haksol' ><input type='text' value='".$cek2['sol']."' name='haksol'></td>";
        echo "<td class='hakharf' ><input type='text' value='".$cek2['L']."' name='hakharf'></td>";

        echo "<td class='haksag' ><input type='text' value='".$cek2['sag']."' name='haksag'></td>";
        echo "<td class='hakalt' ><input type='text' value='".$cek2['alt']."' name='hakalt'></td>";
        echo "</tr>";
    }
}
else
{
    echo "Veri tabanında Hiçbir veri bulunamadı.";
}

echo "</table> <br>";


// Diğer tablo için aynı işlemi tekrar ediyoruz
echo "<br><br>";


echo "<table id='customers'>
            <tr><th class='egitimbaslik'>Egitim Baslik</th>
            <th class='egitimicyazi'>iç Yazı</th>
            </tr>";
$seç3="SELECT * FROM adminegitimler";
$sonuc3=$baglan->query($seç3);
if($sonuc3->num_rows>0)
{ // satır sayısı sıfırdan büyükse
    $i=1;
    while($cek3=$sonuc3->fetch_assoc()) {
        echo "<tr>";
        // Her bir değer için bir input alanı oluşturuluyor

        echo "<td class='baslik'><input type='text' value='".$cek3['baslik']."' name='baslik[$i]'></td>";
        echo "<td class='icyazi'><input type='text' value='".$cek3['icyazi']."' name='icyazi[$i]'></td>";

        echo "</tr>";
        $i++;
// burada değişiklikler yapacağım daha fazla td oluşturup tek tek çekip tek tek güncelleme işlemi yapmak gibi
    }
}
else
{
    echo "Veri tabanında Hiçbir veri bulunamadı.";
}

echo "</table> <br>";

?>



        <br>
        <button class="learn-more" type="submit" name="update"> <a href="index.php">Güncelle</a></button>

        <button class="learn-more"> <a href="adminana.php"> Geri Dön </a> </button>

        </form>
       

        <?php
//güncelleme
include("baglanti.php");

if (isset($_POST["update"])) { // Form gönderildi mi kontrolü
    $h2kar = $_POST["h2karmen"];
    $karmenalt = $_POST["karmenalt"];
    
    // Güncelleme sorgusu
    $gnc = "UPDATE adminana SET h2karmen='" . $h2kar . "', karmenalt='" . $karmenalt . "' WHERE id=1";

    if ($baglan->query($gnc) === TRUE) {
        echo "<script>alert('Güncelleme Başarı ile Yapılmıştır.')</script>";
    } else {
        echo "<script>alert('Güncelleme Naşarısız Bir hata oluştu.')</script>";
    }
}

if (isset($_POST["update"])) { // Form gönderildi mi kontrolü
    $haksol = $_POST["haksol"];
    $hakharf = $_POST["hakharf"];
    $haksag= $_POST["haksag"];
    $hakalt= $_POST["hakalt"];
    // Güncelleme sorgusu
    $gnc = "UPDATE adminhakkimizda SET sol='" . $haksol . "', L='" . $hakharf . "', sag='" . $haksag . "', alt='" . $hakalt . "' WHERE id=1";
    if ($baglan->query($gnc) === TRUE) {
        echo "<script>alert('Güncelleme Başarı ile Yapılmıştır.')</script>";
    } else {
        echo "<script>alert('Güncelleme Naşarısız Bir hata oluştu.')</script>";
    }
}


if (isset($_POST["update"])) {
    // Form alanlarının adlarını bir dizi içinde tutun
    $alanlar = array("baslik", "icyazi");

    // Her bir satır için güncelleme işlemini gerçekleştirin
    for ($i = 1; $i <= count($alanlar); $i++) {
        // Formdan gelen verileri alın
        $baslik = $_POST["baslik"][$i];
        $icyazi = $_POST["icyazi"][$i];

        // Güncelleme sorgusu
        $guncelle = "UPDATE adminegitimler SET baslik='$baslik', icyazi='$icyazi' WHERE id=$i";

        // Sorguyu çalıştırın
        if ($baglan->query($guncelle) === TRUE) {
            echo "<script>alert('Güncelleme Başarı ile Yapılmıştır.')</script>";
        } else {
            echo "<script>alert('Güncelleme Başarısız.')</script>";
        }
    }
}



?>

        <br>
     <form method="post" action="#">


    <script>
        function limitLength(element, maxLength) {
            if (element.textContent.length > maxLength) {
                element.textContent = element.textContent.substring(0, maxLength);
                alert("Maksimum karakter sayısını aştınız.");
            }
        }
    </script>
    </form>


 </form>
</body>

</html>
