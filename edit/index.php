<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan_pgweb_acara8";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM `data_sppg` WHERE id = $id";
$result = $conn->query($sql);

echo "<!DOCTYPE html>
<html lang='id'>
<head>
    <meta charset='UTF-8'>
    <title>Form Edit Data SPPG</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f1f5f9; padding: 40px 20px; }
        .form-card { background: #ffffff; max-width: 550px; margin: 0 auto; padding: 24px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        h2 { margin-bottom: 20px; color: #0f172a; font-size: 1.3rem; }
        .form-group { margin-bottom: 14px; }
        label { display: block; margin-bottom: 5px; font-weight: 600; font-size: 0.85rem; color: #475569; }
        input[type='text'], textarea { width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.9rem; outline: none; }
        .btn-submit { width: 100%; background: #f59e0b; color: white; padding: 10px; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; margin-top: 10px; }
        .btn-submit:hover { background: #d97706; }
    </style>
</head>
<body>
<div class='form-card'>
    <h2>Form Edit Data SPPG</h2>";

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<form action='edit.php' method='post'>
            <input type='hidden' name='id' value='" . $row['id'] . "'>
            
            <div class='form-group'>
                <label>Nama SPPG:</label>
                <input type='text' name='namasppg' value='" . htmlspecialchars($row['namasppg']) . "' required>
            </div>
            <div class='form-group'>
                <label>Kapanewon:</label>
                <input type='text' name='kapanewon' value='" . htmlspecialchars($row['kapanewon']) . "' required>
            </div>
            <div class='form-group'>
                <label>Kalurahan:</label>
                <input type='text' name='kalurahan' value='" . htmlspecialchars($row['kalurahan']) . "' required>
            </div>
            <div class='form-group'>
                <label>Alamat Lengkap:</label>
                <textarea name='alamat' rows='3' required>" . htmlspecialchars($row['alamat']) . "</textarea>
            </div>
            <div class='form-group'>
                <label>Longitude:</label>
                <input type='text' name='longitude' value='" . htmlspecialchars($row['longitude']) . "' required>
            </div>
            <div class='form-group'>
                <label>Latitude:</label>
                <input type='text' name='latitude' value='" . htmlspecialchars($row['latitude']) . "' required>
            </div>
            
            <input type='submit' value='Simpan Perubahan' class='btn-submit'>
        </form>";
    }
} else {
    echo "<p style='color: #64748b;'>Data tidak ditemukan.</p>";
}

echo "</div>
</body>
</html>";

$conn->close();
?>