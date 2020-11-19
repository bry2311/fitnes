<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from tbl_harga where id_harga='$id'");
header("location:product_data.php?alert=hapus");