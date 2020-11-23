<?php
include '../koneksi.php';
$nama_produk=$_POST['nama_produk'];
$harga_produk=$_POST['harga_produk'];
$kategori=$_POST['kategori'];
$kode_produk=rand(10000,99999);

mysqli_query($koneksi, "insert into tbl_produk (nama_produk,harga_produk,kode_produk,kategori) values ('$nama_produk','$harga_produk','$kode_produk','$kategori')");	
header("location:product_data.php");

?>