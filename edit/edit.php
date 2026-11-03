<?php
$id = $_POST['id'];
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
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `data_sppg` SET 
        namasppg='$namasppg', 
        kapanewon='$kapanewon', 
        kalurahan='$kalurahan', 
        alamat='$alamat', 
        longitude='$longitude',
        latitude='$latitude' 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record edited successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: ../index.php");
exit();
?>