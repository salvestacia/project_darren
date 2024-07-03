<?php
session_start(); // Mulai session

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in'])) {
    // Jika belum login, redirect kembali ke halaman login atau halaman lain
    header("Location: http://localhost/crud_sales_darren/login.php");
    exit();
}
?>

<?php
include "../config/koneksi.php";

// Query untuk mengambil data product dari tabel product
$query_select_product = "SELECT * FROM product";
$result_select_product = mysqli_query($koneksi, $query_select_product);

// Query untuk mengambil data uom dari tabel uom
$query_select_uom = "SELECT * FROM uom";
$result_select_uom = mysqli_query($koneksi, $query_select_uom);

// Query untuk mengambil data taxes dari tabel taxes
$query_select_taxes = "SELECT * FROM taxes";
$result_select_taxes = mysqli_query($koneksi, $query_select_taxes);

// Query untuk mengambil data taxes dari tabel customer
$query_select_customer = "SELECT * FROM customer";
$result_select_customer = mysqli_query($koneksi, $query_select_customer);


if(isset($_POST['submit'])){
    $transactionid = $_POST['transaction_id'];
    $customerid = $_POST['customer'];
    $orderdate = $_POST['order_date'];
    $productid = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $uom = $_POST['uom'];
    $taxes = $_POST['taxes'];

    // Masukkan data ke tabel transaction_master
    $query_insert_transaction_master = "INSERT INTO transaction_master (transaction_id, customer_id, order_date) VALUES ('$transactionid','$customerid', '$orderdate')";
    $result_insert_transaction_master = mysqli_query($koneksi, $query_insert_transaction_master);

    // Masukkan data ke tabel transaction_detail
    $query_insert_transaction_detail = "INSERT INTO transaction_detail (transaction_id, product_id, quantity, uom, taxes) VALUES ('$transactionid','$productid', '$quantity', '$uom', '$taxes')";
    $result_insert_transaction_detail = mysqli_query($koneksi, $query_insert_transaction_detail);

    if(!$result_insert_transaction_master || !$result_insert_transaction_detail){
        echo "Data gagal ditambahkan!";
    }
    else{
        echo "Data berhasil ditambahkan!";
        header("Location: read.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Transaction Master & Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1{
            color: #333;
            text-align: center;    
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 95%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }

        button[type="submit"]{
            padding: 8px 16px;
            background-color: #80BCBD;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        a.button {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #80BCBD;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover, a.button:hover {
            background-color: #AAD9BB;
        }
    </style>
</head>
<body>
    <h1>Tambah Data Transaction Master & Detail</h1>
    <form method="post">
        <label for="transaction_id">Transaction ID:</label>
        <input type="text" name="transaction_id" id="transaction_id">
        <br>
        <label for="customer">Customer:</label>
        <select name="customer" id="customer">
            <?php
            while ($row = mysqli_fetch_assoc($result_select_customer)) {
                $optionValue = $row['id']; 
                $optionText = $row['id'] . ' - ' . $row['name']; 
                echo "<option value='$optionValue'>$optionText</option>";
            }
            ?>
        </select>
        <br>
        <label for="order_date">Order Date:</label>
        <input type="text" name="order_date" id="order_date">
        <br>
        <label for="product_id">Product:</label>
        <select name="product_id" id="product_id">
            <?php
            while($row = mysqli_fetch_assoc($result_select_product)) {
                echo "<option value='".$row['id']."'>".$row['name']."</option>";
            }
            ?>
        </select>
        <br>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity">
        <br>
        <label for="uom">UoM:</label>
        <select name="uom" id="uom">
            <?php
            while($row = mysqli_fetch_assoc($result_select_uom)) {
                echo "<option value='".$row['id']."'>".$row['measure_unit']."</option>";
            }
            ?>
        </select>
        <br>
        <br>
        <label for="taxes">Taxes:</label>
        <select name="taxes" id="taxes">
            <?php
            while($row = mysqli_fetch_assoc($result_select_taxes)) {
                echo "<option value='".$row['id']."'>".$row['tax']."</option>";
            }
            ?>
        </select>
        <br>
        <br>
        <button type="submit" name="submit">Tambah</button>
        <a href="http://localhost/crud_sales_darren/tabel_transaction_master_detail/read.php" class="button">Kembali</a>
    </form>
    <a href= "http://localhost/crud_sales_darren/logout.php" class= "button">logout</a>
</body>
</html>