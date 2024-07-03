<?php
session_start(); // Mulai session

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in'])) {
    // Jika belum login, redirect kembali ke halaman login atau halaman lain
    header("Location: http://localhost/sistem_absensi/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        *{
            box-sizing: border-box;
        }

        body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        }

        h1{
            text-align: center;
        }
        
        ul{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 45px;
            height: 50vh;
        }

        ul li{
            background-color: #F9F7C9;
            list-style-type: none;
            border: 2px solid black;
            padding: 30px;
        }

        a {
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
        background-color: #80BCBD;
        color: white;
        border-radius: 5px;
        }

        a:hover {
            background-color: #AAD9BB;
        }

    </style>
</head>
<body>
    <h1>Sistem Informasi SDM</h1>
    <ul>
        <li>
            <h3>Data Pegawai</h3>
            <a href='http://localhost/sistem_absensi/tabel_pegawai/read.php'>Masuk</a>
        </li>
        <li>
            <h3>Data User</h3>
            <a href='http://localhost/sistem_absensi/tabel_user/read.php'>Masuk</a>
        </li>
        <li>
            <h3>Tap In / Tap Out System</h3>
            <a href='http://localhost/sistem_absensi/index.php'>Masuk</a>
        </li>
        <li>
            <h3>Rekap Absensi</h3>
            <a href='http://localhost/sistem_absensi/rekapAbsensi.php'>Masuk</a>
        </li>
        <li>
            <h3>Payroll</h3>
            <a href='http://localhost/sistem_absensi/readPayroll.php'>Masuk</a>
        </li>
    </ul>
    <a href= "http://localhost/sistem_absensi/logout.php">logout</a>
</body>
</html>