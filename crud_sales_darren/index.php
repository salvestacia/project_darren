<?php
session_start(); // Mulai session

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in'])) {
    // Jika belum login, redirect kembali ke halaman login atau halaman lain
    header("Location: http://localhost/crud_sales_darren/login.php");
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
            justify-content: space-around;
            align-items: center;
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
    <h1>Sistem Informasi Pelanggan</h1>
    <ul>
        <li>
            <h3>Data Transaction Master & Detail</h3>
            <a href='http://localhost/crud_sales_darren/tabel_transaction_master_detail/read.php'>Masuk</a>
        </li>
        <li>
            <h3>Data Customer</h3>
            <a href='http://localhost/crud_sales_darren/tabel_customer/read.php'>Masuk</a>
        </li>
        <li>
            <h3>Data Product</h3>
            <a href='http://localhost/crud_sales_darren/tabel_product/read.php'>Masuk</a>
        </li>
        <li>
            <h3>Data UoM</h3>
            <a href='http://localhost/crud_sales_darren/tabel_uom/read.php'>Masuk</a>
        </li>
        <li>
            <h3>Data Taxes</h3>
            <a href='http://localhost/crud_sales_darren/tabel_taxes/read.php'>Masuk</a>
        </li>
    </ul>
    <a href= "http://localhost/crud_sales_darren/logout.php">logout</a>
</body>
</html>