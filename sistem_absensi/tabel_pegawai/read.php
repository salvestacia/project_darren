<?php
session_start(); // Mulai session

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in'])) {
    // Jika belum login, redirect kembali ke halaman login atau halaman lain
    header("Location: http://localhost/sistem_absensi/login.php");
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
    <title>Data Pegawai</title>
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
            cursor: pointer;
        }

        a.button:hover {
            background-color: #AAD9BB;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Data Pegawai</h2>

    <a href="http://localhost/sistem_absensi/tabel_pegawai/create.php" class="button">Create</a>
    <a href="http://localhost/sistem_absensi/sistemSdm.php" class="button">Back</a>

    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>divisi</th>
            <th>Action</th>
        </tr>
        <?php
        $query = "SELECT * FROM pegawai";
        $result = mysqli_query($koneksi, $query);

        if(!$result){
            echo "query gagal!";
        } 
        else{
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['nama']."</td>
                        <td>".$row['alamat']."</td>
                        <td>".$row['tgl_lahir']."</td>
                        <td>".$row['divisi']."</td>
                        <td>
                            <a href='http://localhost/sistem_absensi/tabel_pegawai/update.php?id=".$row['id']."' class='button'>Edit</a> 
                            <a href='http://localhost/sistem_absensi/tabel_pegawai/delete.php?id=".$row['id']."' class='button'>Delete</a>
                        </td>
                      </tr>";
            }
        }
        ?>
    </table>
</div>
<a href= "http://localhost/sistem_absensi/logout.php" class= "button">logout</a>
</body>
</html>
