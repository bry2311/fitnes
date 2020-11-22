<?php
include '../koneksi.php';
session_start();
if(isset($_GET['id'])) {

	$tbl_member = "SELECT * FROM tbl_harga WHERE id_harga=".$_GET['id'];
	$rp = mysqli_query($koneksi, $tbl_member);
    $member = mysqli_fetch_array($rp); 
    $id = $_SESSION['id'];
    $nama= $member['kategori_harga'];
	$kode= $member['id_harga'];
	$harga= $member['nilai_harga'];
	mysqli_query($koneksi,"insert into tbl_order (kode_order,nama_order,harga_order,jenis_order,id_customer,status) values('$kode','$nama','$harga','paket','$id','keranjang')");
	header("location:index.php");

}else{
	header("location:index.php");

}


?>