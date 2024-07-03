<?php
include 'config/koneksi.php';

session_start(); // Mulai session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form login
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Query untuk mencari user dengan username dan password yang sesuai
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        // Jika data ditemukan, simpan informasi pengguna dalam session
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;

        // Redirect ke halaman utama
        header("Location: index.php");
        exit(); // Pastikan untuk menghentikan eksekusi kode setelah melakukan redirect
    } else {
        // Jika data tidak ditemukan, tampilkan pesan error atau redirect kembali ke halaman login
        echo "Username atau password salah.";
    }
    mysqli_close($koneksi);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        input{
            width: 250px;
        }
        input[type="submit"]{
            background-color: #80BCBD;
            color: white;
            border-radius: 5px;
            padding: 8px 16px;
            
        }
        input[type="submit"]:hover{
            background-color: #AAD9BB;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container{
            background-color: #F9F7C9;
            padding: 20px 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <p style="font-size:30px; font-weight:bold;">Login</p>
        <p>Kustomisasi Enterprise Resource Planning</p>
        <form method="POST">
            <label for="username">Username</label><br/>
            <input type="text" name="username" id="username" placeholder="Username" ><br/>
            <label for="password">Password</label><br/>
            <input type="password" name="password" id="password" placeholder="Password"><br/><br/>
            <input type="submit" name="submit" value="Masuk"> 
        </form>
    </div>
</body>
</html>
