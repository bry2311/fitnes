<?php
include '../koneksi.php';
$nama_paket=$_POST['nama_paket'];
$harga_paket=$_POST['harga_paket'];
$hari_paket=$_POST['hari_paket'];

mysqli_query($koneksi, "insert into tbl_harga (kategori_harga,nilai_harga,hari_harga) values ('$nama_paket','$harga_paket','$hari_paket')");	
header("location:product_data.php");

?>