<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from tbl_instruktur where id='$id'");
header("location:instruktur_data.php?alert=hapus");