<?php
include 'config/koneksi.php';
session_start(); // Mulai session
// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in'])) {
    // Jika belum login, redirect kembali ke halaman login atau halaman lain
    header("Location: http://localhost/sistem_absensi/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $id_pegawai = $_SESSION['id_pegawai'];
    $hak_akses = $_SESSION['hak_akses'];
    date_default_timezone_set('Asia/Jakarta');
    $tgl_tap = date('Y-m-d-H:i:s');

    if ($action === 'tap_in') {
         // Periksa apakah pengguna memiliki hak akses yang sesuai
         if ($hak_akses == 2) {
            // Redirect ke sistemSdm.php jika memiliki hak akses 2
            header("Location: http://localhost/sistem_absensi/sistemSdm.php");
        }
        // Masukkan data Tap In ke dalam database
        $sql = "INSERT INTO absensi (id_pegawai, tgl_tap, status) VALUES (?, ?, 'Tap In')";
    } elseif ($action === 'tap_out') {
        // Update data Tap Out di dalam database
        $sql = "INSERT INTO absensi (id_pegawai, tgl_tap, status) VALUES (?, ?, 'Tap Out')";
    }

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('is', $id_pegawai, $tgl_tap);
    if ($stmt->execute()) {
        echo "Berhasil melakukan $action.";
    } else {
        echo "Gagal melakukan $action: " . $stmt->error;
    }

    $stmt->close();
}

$koneksi->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Absensi</title>
    <style>
         a, button{
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
        border: none;
        background-color: #80BCBD;
        color: white;
        border-radius: 5px;
        }

        a:hover, button:hover {
            background-color: #AAD9BB;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }  
        #container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #F9F7C9;
            padding: 20px 30px;
        }
    </style>
</head>
<body>
    <div id="container">
    <h1>Tap In / Tap Out System</h1> 
    <div id="clock" style="font-size: 24px; margin-bottom: 20px;"></div>
    <form action="index.php" method="post">
        <button type="submit" name="action" value="tap_in">Tap In</button>
        <button type="submit" name="action" value="tap_out">Tap Out</button>
        <a href= "http://localhost/sistem_absensi/logout.php">logout</a>
    </form>
    </div>
    <script>
         function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
            document.getElementById('clock').innerHTML = strTime;
        }
        setInterval(updateClock, 1000);
        updateClock(); // initial call to display the clock immediately
    </script>
</body>
</html>