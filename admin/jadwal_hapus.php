<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from tbl_jadwal where id='$id'");
header("location:jadwal_data.php?alert=hapus");