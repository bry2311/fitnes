<?php
include '../koneksi.php';
session_start();
$tgl_bayar=date('Y-m-d');
$id = $_SESSION['id'];
$data2 = mysqli_query($koneksi,"SELECT * FROM tbl_order WHERE id_customer = $id");
while($d2 = mysqli_fetch_array($data2)){
    $tmpId = $d2['id_order'];
    mysqli_query($koneksi,"UPDATE tbl_order SET status='order' WHERE id_order = $tmpId");
}
// mysqli_query($koneksi,"delete from tbl_order");
header("location:index.php?alert=dibayar");

?>