<?php
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi,"delete from tbl_order where id_order='$id'");
header("location:order_data.php?alert=hapus");
?>