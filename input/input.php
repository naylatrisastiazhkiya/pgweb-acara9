<?php
$namasppg = $_POST['namasppg'];
$kapanewon = $_POST['kapanewon'];
$kalurahan = $_POST['kalurahan'];
$alamat = $_POST['alamat'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan_pgweb_acara8";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "INSERT INTO `data_sppg` (namasppg, kapanewon, kalurahan, alamat, longitude, latitude) 
        VALUES ('$namasppg', '$kapanewon', '$kalurahan', '$alamat', '$longitude', '$latitude')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: ../index.php");
exit();
?>