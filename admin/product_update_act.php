<?php
include '../koneksi.php';
$id=$_POST['id'];
$nama_produk=$_POST['nama_produk'];
$harga_produk=$_POST['harga_produk'];
$kategori=$_POST['kategori'];
$kode_produk=$_POST['kode_produk'];

mysqli_query($koneksi, "update tbl_produk set nama_produk='$nama_produk',kode_produk='$kode_produk',kategori='$kategori',harga_produk='$harga_produk' where id_produk='$id'");	
header("location:product_data.php");

?>