<?php
include '../koneksi.php';
$id=$_POST['id'];
$kategori=$_POST['nama_harga'];
$nilai=$_POST['nilai_harga'];
$hari=$_POST['hari_harga'];
mysqli_query($koneksi, "update tbl_harga set kategori_harga='$kategori',nilai_harga='$nilai',hari_harga='$hari' where id_harga='$id'");	
header("location:product_data.php");

?>