
<?php
include '../koneksi.php';
session_start();
$nama_instruktur=$_POST['nama_instruktur'];
mysqli_query($koneksi,"insert into tbl_instruktur (name) values ('$nama_instruktur')");
header("location:instruktur_data.php?alert=add");