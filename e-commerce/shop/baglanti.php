<?php

/*else{
    echo"bağlantı başarılı";
}*/

$servername = "localhost";
$vusername = "root";
$password = "";
$dbname = "papirus";

// Veritabanı bağlantısını oluştur
$conn = new mysqli('localhost', 'root', '', 'papirus');

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}
/*
// Formdan gelen verileri al
$adsoyad = $_POST["adsoyad"];
$mail = $_POST["mail"];
$yazi = $_POST["yazi"];

// Veritabanına ekleme işlemi
$sql = "INSERT INTO iletisim1 (isim, email, mesaj) VALUES ('$adsoyad', '$mail', '$yazi')";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Hata oluştu: " . $sql . "<br>" . $conn->error;
}

$conn->close();*/
?>











