<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan_pgweb_acara8";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM `data_sppg`";
$result = $conn->query($sql);

echo "<!DOCTYPE html>
<html lang='id'>
<head>
    <meta charset='UTF-8'>
    <title>Data SPPG Prambanan</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f1f5f9; color: #334155; padding: 30px 20px; }
        .main-card { background: #ffffff; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); padding: 24px; width: 96%; max-width: 1400px; margin: 0 auto; }
        .header-flex { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        h2 { color: #0f172a; font-size: 1.4rem; }
        .btn-add { background-color: #2563eb; color: white; padding: 9px 16px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.9rem; }
        .btn-add:hover { background-color: #1d4ed8; }
        .table-container { max-height: 55vh; overflow-y: auto; border: 1px solid #e2e8f0; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { background-color: #f8fafc; color: #475569; padding: 12px 16px; position: sticky; top: 0; z-index: 10; border-bottom: 2px solid #e2e8f0; }
        td { padding: 12px 16px; border-bottom: 1px solid #f1f5f9; font-size: 0.9rem; }
        tr:hover { background-color: #f8fafc; }
        .btn-action { display: inline-block; padding: 6px 14px; border-radius: 6px; text-decoration: none; font-size: 0.85rem; font-weight: 500; cursor: pointer; border: none; }
        .btn-edit { background-color: #f59e0b; color: white; margin-right: 4px; }
        .btn-edit:hover { background-color: #d97706; }
        .btn-delete { background-color: #ef4444; color: white; }
        .btn-delete:hover { background-color: #dc2626; }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(4px);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }
        .modal-box {
            background: #ffffff;
            width: 90%; max-width: 400px;
            padding: 24px; border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: popupAnimation 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        @keyframes popupAnimation {
            0% { opacity: 0; transform: scale(0.8); }
            100% { opacity: 1; transform: scale(1); }
        }
        .modal-icon { width: 52px; height: 52px; background-color: #fee2e2; color: #ef4444; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 16px auto; font-size: 24px; font-weight: bold; }
        .modal-title { font-size: 1.15rem; font-weight: 700; color: #0f172a; margin-bottom: 8px; }
        .modal-desc { font-size: 0.88rem; color: #64748b; margin-bottom: 22px; line-height: 1.4; }
        .modal-actions { display: flex; gap: 10px; }
        .btn-modal { flex: 1; padding: 10px 16px; border-radius: 8px; font-size: 0.88rem; font-weight: 600; cursor: pointer; border: none; text-decoration: none; display: inline-block; }
        .btn-cancel { background-color: #f1f5f9; color: #475569; }
        .btn-cancel:hover { background-color: #e2e8f0; }
        .btn-confirm-delete { background-color: #ef4444; color: white; }
        .btn-confirm-delete:hover { background-color: #dc2626; }
    </style>
</head>
<body>

<div class='main-card'>
    <div class='header-flex'>
        <h2>Data SPPG Prambanan</h2>
        <a href='input/index.html' class='btn-add'>+ Tambah SPPG</a>
    </div>
    <div class='table-container'>";

if ($result && $result->num_rows > 0) {
    echo "<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama SPPG</th>
            <th>Kapanewon</th>
            <th>Kalurahan</th>
            <th>Alamat</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th style='text-align: center;'>Aksi</th>
        </tr>
    </thead>
    <tbody>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["namasppg"] . "</td>
            <td>" . $row["kapanewon"] . "</td>
            <td>" . $row["kalurahan"] . "</td>
            <td>" . $row["alamat"] . "</td>
            <td>" . $row["longitude"] . "</td>
            <td>" . $row["latitude"] . "</td>
            <td align='center'>
                <a href='edit/index.php?id=" . $row["id"] . "' class='btn-action btn-edit'>Edit</a>
                <button class='btn-action btn-delete' onclick='openDeleteModal(" . $row["id"] . ")'>Hapus</button>
            </td>
        </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p style='padding: 20px; text-align: center; color: #64748b;'>Data SPPG tidak ditemukan</p>";
}

echo "</div>
</div>

<div id='customDeleteModal' class='modal-overlay'>
    <div class='modal-box'>
        <div class='modal-icon'>&#9888;</div>
        <div class='modal-title'>Hapus Data SPPG?</div>
        <div class='modal-desc'>Apakah Anda yakin ingin menghapus data lokasi SPPG ini dari basis data?</div>
        <div class='modal-actions'>
            <button class='btn-modal btn-cancel' onclick='closeDeleteModal()'>Batal</button>
            <a id='confirmDeleteLink' href='#' class='btn-modal btn-confirm-delete'>Ya, Hapus</a>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(id) {
        document.getElementById('confirmDeleteLink').href = 'delete.php?id=' + id;
        document.getElementById('customDeleteModal').style.display = 'flex';
    }

    function closeDeleteModal() {
        document.getElementById('customDeleteModal').style.display = 'none';
    }

    window.onclick = function(event) {
        var modal = document.getElementById('customDeleteModal');
        if (event.target == modal) {
            closeDeleteModal();
        }
    }
</script>

</body>
</html>";

$conn->close();
?>