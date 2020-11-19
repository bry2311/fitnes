<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from tbl_member where id_member='$id'");
header("location:member_data.php?alert=hapus");