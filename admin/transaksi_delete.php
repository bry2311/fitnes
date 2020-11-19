<?php
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi,"delete from tbl_pembayaran where id_pembayaran='$id'");
header("location:transaksi_data.php?alert=hapus");
?>