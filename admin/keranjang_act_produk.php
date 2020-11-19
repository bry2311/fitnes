<?php
include '../koneksi.php';

if(isset($_GET['id'])) {
	$tbl_produk = "SELECT * FROM tbl_produk WHERE kode_produk=".$_GET['id'];
	$rp = mysqli_query($koneksi, $tbl_produk);
	$produk = mysqli_fetch_array($rp); 

	$nama=$produk['nama_produk'];
	$kode=$produk['kode_produk'];
	$harga=$produk['harga_produk'];
	mysqli_query($koneksi,"insert into tbl_order (kode_order,nama_order,harga_order) values('$kode','$nama','$harga')");
	header("location:index.php");
}else{
	header("location:index.php");
}


?>