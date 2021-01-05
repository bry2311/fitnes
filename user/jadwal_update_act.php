<?php
include '../koneksi.php';
$id=$_POST['id'];
$nama_instruktur=$_POST['nama_instruktur'];
$nama_hari=$_POST['nama_hari'];
$jam_mulai=$_POST['jam_mulai'];
$jam_selesai=$_POST['jam_selesai'];
mysqli_query($koneksi, "update tbl_jadwal set id_instruktur='$nama_instruktur',hari='$nama_hari',jam_mulai='$jam_mulai',jam_selesai='$jam_selesai' where id='$id'");	
header("location:jadwal_data.php");
?>