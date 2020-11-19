<?php
include '../koneksi.php';
$tgl_bayar=date('Y-m-d');
$dibeli=$_POST['dibeli'];
$total_beli=$_POST['total_beli'];

mysqli_query($koneksi,"insert into tbl_pembayaran (tgl_pembayaran,jumlah_pembayaran,ket_pembayaran) values('$tgl_bayar','$total_beli','$dibeli')");
mysqli_query($koneksi,"delete from tbl_order");
header("location:index.php?alert=dibayar");

?>