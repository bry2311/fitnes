
<?php
include '../koneksi.php';
session_start();
$nama_instruktur=$_POST['nama_instruktur'];
$nama_hari=$_POST['nama_hari'];
$jam_mulai=$_POST['jam_mulai'];
$jam_selesai=$_POST['jam_selesai'];
mysqli_query($koneksi,"insert into tbl_jadwal (id_instruktur,hari,jam_mulai,jam_selesai) values ('$nama_instruktur','$nama_hari','$jam_mulai','$jam_selesai')");
header("location:jadwal_data.php?alert=add");