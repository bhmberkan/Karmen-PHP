<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
   <link rel="stylesheet" href="buttonmavi.css">
   <link rel="stylesheet" href="/css/button.css">
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
</head>

<body>

    <h1>Gelen Mesajlar</h1>

    <table id="customers">
        <tr>
            <th>Ad Soyad</th>
            <th>Telefon</th>
            <th>Email</th>
            <th>Konu</th>
            <th>Mesaj</th>
        </tr>

        <?php
    
    session_start();
    if($_SESSION["user"]=="")
    {
        
        echo "<script>window.location.href='cikis.php'</script>";
    }
    else
    {
        
        echo"Kullanıcı Adınız : ".$_SESSION['user']."<br>";
        echo"<a href='index.php'>ÇIKIŞ YAP</a><br><br>";
        
        
        include("baglanti.php");

$seç="SELECT * FROM iletisim";
$sonuc=$baglan->query($seç);
if($sonuc->num_rows>0)  // satır sayısı sıfırdan büyükse
{
    while($cek=$sonuc->fetch_assoc())
    {
        echo"
        
    <tr>
      <td>".$cek['adsoyad']."</td>
      <td>".$cek['telefon']."</td>
      <td>".$cek['email']."</td>
      <td>".$cek['konu']."</td>
      <td>".$cek['mesaj']."</td>
    </tr>
        
        
        ";
    }
}
else
{
    echo"Veri tabanında Hiçbir veri bulunamadı.";
}
    
    }







?>

    </table>
    <br>
<a href="../php_proje/adminana.php" class="whitehref">
<button class="btnmavi">Ana Sayfa Düzenle </button>
</a>

</body>

</html>