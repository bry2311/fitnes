
<?php
include '../koneksi.php';
session_start();
$id_jadwal =$_GET['id'];
$id_member = $_SESSION['id'];
mysqli_query($koneksi,"insert into tbl_jadwal_member (id_jadwal,id_member) values ('$id_jadwal','$id_member')");
header("location:jadwal_data.php?alert=add");