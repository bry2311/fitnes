<?php
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi,"delete from tbl_bukti where id='$id'");
header("location:order_data.php?alert=hapus");
?>