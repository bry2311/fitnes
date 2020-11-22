<?php
include '../koneksi.php';
session_start();
if(isset($_GET['id'])) {
	$tbl_produk = "SELECT * FROM tbl_produk WHERE kode_produk=".$_GET['id'];
	$rp = mysqli_query($koneksi, $tbl_produk);
	$produk = mysqli_fetch_array($rp); 

	$nama=$produk['nama_produk'];
	$kode=$produk['kode_produk'];
	$harga=$produk['harga_produk'];
	$id = $_SESSION['id'];
	mysqli_query($koneksi,"insert into tbl_order (kode_order,nama_order,harga_order,jenis_order,id_customer,status) values('$kode','$nama','$harga','produk','$id','keranjang')");
	header("location:index.php");
}else{
	header("location:index.php");
}


?>