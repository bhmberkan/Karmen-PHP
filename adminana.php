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
                <th class="karmenalt" >Karmen alt</th>
            </tr>

            <?php
            session_start();
            if($_SESSION["user"]=="") {
                echo "<script>window.location.href='cikis.php'</script>";
            } else {
                echo "Kullanıcı Adınız : ".$_SESSION['user']."<br>";
                echo "<a href='cikis.php'>ÇIKIŞ YAP</a><br><br>";
                include("baglanti.php");


                $seç="SELECT * FROM adminana";
                $sonuc=$baglan->query($seç);
                if($sonuc->num_rows>0)
                { // satır sayısı sıfırdan büyükse
                while($cek=$sonuc->fetch_assoc()) {

                echo "<tr>";
                    echo "<td class='h2kar' oninput='limitLength(this, 15)' name='h2kar' >".$cek['h2karmen']."</td>";
                    echo "<td class='karmenalt' oninput='limitLength(this, 250)' name='karmenalt'>".$cek['karmenalt']."</td>";
                    echo "</tr>";
                    }
                    } else {
                    echo "Veri tabanında Hiçbir veri bulunamadı.";
                    }
                    }
 echo "</table>";
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
                        echo "<td class='haksol' oninput='limitLength(this, 40)' name='hakharf'>".$cek2['sol']."</td>";
                        echo "<td class='karmenalt' oninput='limitLength(this, 1)' name='karmenalt'>".$cek2['L']."</td>";
                        
                    echo "<td class='haksag' oninput='limitLength(this, 180)'>".$cek2['sag']."</td>";
                    echo "<td class='hakalt' oninput='limitLength(this, 100)'>".$cek2['alt']."</td>";
                        echo "</tr>";
                        
                    }}
                    else
                    {
                    echo "Veri tabanında Hiçbir veri bulunamadı.";
                    }
               
echo "</table> <br>";
                $seç3="SELECT * FROM adminegitimler";
                $sonuc3=$baglan->query($seç3);
                if($sonuc3->num_rows>0)
                { // satır sayısı sıfırdan büyükse
                echo "<table id='customers'>
            <tr><th class='egitimbaslik'>Egitim Baslik</th>
            <th class='egitimicyazi'>iç Yazı</th>
            </tr>";
                while($cek3=$sonuc3->fetch_assoc()) {

                echo "<tr>";
                    echo "<td class='egitimbaslik' oninput='limitLength(this, 15)' name='h2kar' >".$cek3['baslik']."</td>";
                    echo "<td class='egitimicyazi' oninput='limitLength(this, 70)' name='karmenalt'>".$cek3['icyazi']."</td>";
                    echo "</tr>";
                    }
                    } 
                else {
                    echo "Veri tabanında Hiçbir veri bulunamadı.";
                    }
                    
 echo "</table>";
            echo "<br><br>";
                    

//güncelleme
include("baglanti.php");

if(isset($_POST["h2karmen"], $_POST["karmenalt"])) {
    $h2kar = $_POST["h2karmen"];
    $karmenalt = $_POST["karmenalt"];

    $gnc = "UPDATE adminana SET h2karmen='".$h2kar."', karmenalt='".$karmenalt."' WHERE 'id'= 1"; 

    if($baglan->query($gnc) === TRUE) {
        echo "<script>alert('Mesajınız Başarı ile Gönderilmiştir.')</script>";
    } else {
        echo "<script>alert('Mesajınız Gönderilirken Bir hata oluştu.')</script>";
    }
}


?>

        </table>
        
        <form method="post" action="#">
           <br>
            <button class="learn-more" type="submit" name="update"><a href="adminanaduzenle.php">Güncelle</a></button>
        </form>

    <script>
        function limitLength(element, maxLength) {
            if (element.textContent.length > maxLength) {
                element.textContent = element.textContent.substring(0, maxLength);
                alert("Maksimum karakter sayısını aştınız.");
            }
        }
    </script>
</form>
</body>

</html>
