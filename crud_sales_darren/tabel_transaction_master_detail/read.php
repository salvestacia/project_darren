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
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Transaction Master & Detail</title>
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

    .container{
        margin: 20px;
    }

    h2 {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th {
        background-color: #f2f2f2;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }
    
    a.button {
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
        background-color: #80BCBD;
        color: white;
        border-radius: 5px;
    }

    a.button:hover {
        background-color: #AAD9BB;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Data Transaction Master & Detail</h2>

    <a href="http://localhost/crud_sales_darren/tabel_transaction_master_detail/create.php" class="button">Create</a>
    <a href="http://localhost/crud_sales_darren/index.php" class="button">Back</a>

    <table border='1'>
        <tr>
            <th>Transaction ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Order Date</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>UoM</th>
            <th>Unit Price</th>
            <th>Taxes</th>
            <th>Action</th>
        </tr>
        <?php
        $query = "SELECT transaction_master.transaction_id, customer.id, customer.name, customer.address, transaction_master.order_date, product.name AS product, 
        transaction_detail.quantity, uom.measure_unit AS uom, product.sales_price AS unit_price, taxes.tax AS taxes
        FROM transaction_master
        JOIN transaction_detail ON transaction_detail.transaction_id = transaction_master.transaction_id
        JOIN customer ON transaction_master.customer_id = customer.id
        JOIN product ON transaction_detail.product_id = product.id
        JOIN taxes ON transaction_detail.taxes = taxes.id
        JOIN uom ON transaction_detail.uom = uom.id";
        $result = mysqli_query($koneksi, $query);

        if(!$result){
            echo "query gagal!";
        } 
        else{
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td>".$row['transaction_id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['address']."</td>
                        <td>".$row['order_date']."</td>
                        <td>".$row['product']."</td>
                        <td>".$row['quantity']."</td>
                        <td>".$row['uom']."</td>
                        <td>".$row['unit_price']."</td>
                        <td>".$row['taxes']."</td>
                        <td>
                            <a href='http://localhost/crud_sales_darren/tabel_transaction_master_detail/update.php?id=".$row['transaction_id']."' class='button'>Edit</a> 
                            <a href='http://localhost/crud_sales_darren/tabel_transaction_master_detail/delete.php?id=".$row['transaction_id']."' class='button'>Delete</a>
                        </td>
                      </tr>";
            }
        }
        ?>
    </table>
</div>
<a href= "http://localhost/crud_sales_darren/logout.php" class= "button">logout</a>
</body>
</html>
