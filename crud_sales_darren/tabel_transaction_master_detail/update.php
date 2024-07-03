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

// Query untuk mengambil data dari tabel transaction_master
$query_select_transaction_master = "SELECT * FROM transaction_master WHERE transaction_id='$id'";
$result_select_transaction_master = mysqli_query($koneksi, $query_select_transaction_master);

// Query untuk mengambil data dari tabel transaction_detail
$query_select_transaction_detail = "SELECT * FROM transaction_detail  WHERE transaction_id='$id'";
$result_select_transaction_detail = mysqli_query($koneksi, $query_select_transaction_detail);

// Query untuk mengambil data customer dari tabel customer
$query_select_customer = "SELECT * FROM customer";
$result_select_customer = mysqli_query($koneksi, $query_select_customer);

// Query untuk mengambil data product dari tabel product
$query_select_product = "SELECT * FROM product";
$result_select_product = mysqli_query($koneksi, $query_select_product);

// Query untuk mengambil data uom dari tabel uom
$query_select_uom = "SELECT * FROM uom";
$result_select_uom = mysqli_query($koneksi, $query_select_uom);

// Query untuk mengambil data taxes dari tabel taxes
$query_select_taxes = "SELECT * FROM taxes";
$result_select_taxes = mysqli_query($koneksi, $query_select_taxes);

if(!$result_select_transaction_master || !$result_select_transaction_detail || !$result_select_customer || !$result_select_product || !$result_select_uom || !$result_select_taxes){
    echo "Query gagal!";
}
else{
    $data1 = mysqli_fetch_assoc($result_select_transaction_master);
    $data2 = mysqli_fetch_assoc($result_select_transaction_detail);
    mysqli_data_seek($result_select_customer, 0); 
    mysqli_data_seek($result_select_product, 0);
    mysqli_data_seek($result_select_uom, 0); 
    mysqli_data_seek($result_select_taxes, 0);
}

if(isset($_POST["submit"])){
    $transactionid = $_POST['transaction_id'];
    $customerid = $_POST['customer_id'];
    $orderdate = $_POST['order_date'];
    $productid = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $uom = $_POST['uom'];
    $taxes = $_POST['taxes'];

    // Update data tabel transaction_master
    $query_update_transaction_master = "UPDATE transaction_master SET transaction_id = '$transactionid', customer_id ='$customerid', order_date = '$orderdate' WHERE transaction_id ='$transactionid' ";
    $result_query_update_transaction_master = mysqli_query($koneksi, $query_update_transaction_master);

    // Update data tabel transaction_detail
    $query_update_transaction_detail = "UPDATE transaction_detail SET transaction_id = '$transactionid', product_id ='$productid', quantity = '$quantity', uom = '$uom', taxes = '$taxes' WHERE transaction_id ='$transactionid' ";
    $result_query_update_transaction_detail = mysqli_query($koneksi, $query_update_transaction_detail);


    if(!$result_query_update_transaction_master || !$result_query_update_transaction_detail){
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
    <title>Ubah Data Transaction Master & Detail</title>
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
    <h1>Ubah Data Transaction Master & Detail</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">   

        <label for="transaction_id">Transaction ID:</label>
        <input type="text" name="transaction_id" id="transaction_id" value="<?php echo $data1['transaction_id']; ?>">
        <br>
        <label for="customer_id">Customer:</label>
        <select name="customer_id" id="customer_id">
            <?php
            while ($row = mysqli_fetch_assoc($result_select_customer)) {
                $optionValue = $row['id'];
                $optionText = $row['id'] . ' - ' . $row['name'];
                $selected = ($row['id'] == $data1['customer_id']) ? 'selected' : '';
                echo "<option value='$optionValue' $selected>$optionText</option>";
            }
            ?>
        </select>

        <br>
        <label for="order_date">Order Date:</label>
        <input type="text" name="order_date" id="order_date" value="<?php echo $data1['order_date']; ?>">
        <br>
        <label for="product_id">Product:</label>
        <select name="product_id" id="product_id">
            <?php
            while($row = mysqli_fetch_assoc($result_select_product)) {
                $selected = ($row['id'] == $data2['product_id']) ? 'selected' : ''; 
                echo "<option value='".$row['id']."' ".$selected.">".$row['name']."</option>";
            }
            ?>
        </select>
        <br>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity" value="<?php echo $data2['quantity']; ?>">
        <br>
        <label for="uom">UoM:</label>
        <select name="uom" id="uom">
        <?php
            while($row = mysqli_fetch_assoc($result_select_uom)) {
                $selected = ($row['id'] == $data2['uom']) ? 'selected' : ''; 
                echo "<option value='".$row['id']."' ".$selected.">".$row['measure_unit']."</option>";
            }
        ?>
        </select>
        <br>
        <br>
        <label for="taxes">Taxes:</label>
        <select name="taxes" id="taxes">
        <?php
            while ($row = mysqli_fetch_assoc($result_select_taxes)) {
                $selected = ($row['id'] == $data2['taxes']) ? 'selected' : '';
                echo "<option value='".$row['id']."' ".$selected.">".$row['tax']."</option>";
            }
        ?>
        </select>
        <br>
        <br>
        <button type="submit" name="submit">Ubah</button>
        <a href="http://localhost/crud_sales_darren/tabel_transaction_master_detail/read.php" class="button">Kembali</a>
    </form>
    <a href= "http://localhost/crud_sales_darren/logout.php" class= "button">logout</a>
</body>
</html>