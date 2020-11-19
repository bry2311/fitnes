<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from tbl_produk where id_produk='$id'");
header("location:product_data.php?alert=hapus");