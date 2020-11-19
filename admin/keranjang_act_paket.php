<?php
include '../koneksi.php';

if(isset($_GET['id'])) {

	$tbl_member = "SELECT * FROM tbl_harga WHERE id_harga=".$_GET['id'];
	$rp = mysqli_query($koneksi, $tbl_member);
    $member = mysqli_fetch_array($rp); 
    
    $nama= $member['kategori_harga'];
	$kode= $member['id_harga'];
	$harga= $member['nilai_harga'];
	mysqli_query($koneksi,"insert into tbl_order (kode_order,nama_order,harga_order) values('$kode','$nama','$harga')");
	header("location:index.php");

}else{
	header("location:index.php");

}


?>