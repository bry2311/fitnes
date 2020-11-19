<?php
include '../koneksi.php';
$nama_produk=$_POST['nama_produk'];
$harga_produk=$_POST['harga_produk'];
$kode_produk=rand(10000,99999);

mysqli_query($koneksi, "insert into tbl_produk (nama_produk,harga_produk,kode_produk) values ('$nama_produk','$harga_produk','$kode_produk')");	
header("location:product_data.php");

?>