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
$id = $_GET['id'];
$query = "SELECT * FROM product  WHERE id= '$id'";
$result = mysqli_query($koneksi, $query);
if(!$result){
    echo "Query gagal!";
}
else{
    $data = mysqli_fetch_assoc($result);
}
if(isset($_POST["submit"])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $salesprice = $_POST['sales_price'];
    $query = "UPDATE product SET id = '$id', name ='$name', sales_price = '$salesprice'  WHERE id ='$id' ";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        echo "Data gagal diubah!";
    }
    else{
        echo "Data berhasil diubah!";
        header("Location: read.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
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
    <h1>Ubah Data Mahasiswa</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" value="<?php echo $data['id']; ?>">
        <br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $data['name']; ?>">
        <br>
        <label for="sales_price">Sales Price:</label>
        <input type="text" name="sales_price" id=sales_price value="<?php echo $data['sales_price']; ?>">
        <br>
        <br>
        <button type="submit" name="submit">Ubah</button>
        <a href="http://localhost/crud_sales_darren/tabel_product/read.php" class="button">Kembali</a>
    </form>
    <a href= "http://localhost/crud_sales_darren/logout.php" class= "button">logout</a>
</body>
</html>