<?php
include "../config/koneksi.php";
$id = $_GET['id'];

try {
    $query = "DELETE FROM user WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        throw new Exception("Data gagal dihapus!");
    } else {
        echo "Data berhasil dihapus!";
        header("Location: http://localhost/sistem_absensi/tabel_user/read.php");
    }
} catch (Exception $e) {
    echo "Invalid operation! Ada data di tabel child yang terhubung!";
}
?>
