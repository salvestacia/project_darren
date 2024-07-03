<?php
include "../config/koneksi.php";
$id = $_GET['id'];

$query_delete_transaction_detail = "DELETE FROM transaction_detail WHERE transaction_id = '$id'";
$result_delete_transaction_detail = mysqli_query($koneksi, $query_delete_transaction_detail);

$query_delete_transaction_master = "DELETE FROM transaction_master WHERE transaction_id = '$id'";
$result_delete_transaction_master = mysqli_query($koneksi, $query_delete_transaction_master);

if(!$result_delete_transaction_master || !$result_delete_transaction_detail){
    echo "Data gagal dihapus!";
}
else{
    echo "Data berhasil dihapus!";
    header("Location: read.php");
}
?>