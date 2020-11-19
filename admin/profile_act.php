<?php
include '../koneksi.php';
$id_admin=$_POST['id_admin'];
$nama_admin=$_POST['nama_admin'];

$id_fitnes=$_POST['id_fitnes'];
$nama_fitnes=$_POST['nama_fitnes'];
$alamat_fitnes=$_POST['alamat_fitnes'];
$ketua_fitnes=$_POST['ketua_fitnes'];

if(isset($_POST['admin'])){

mysqli_query($koneksi, "update admin set nama_admin='$nama_admin' where id_admin='$id_admin'");
header("location:profile.php?alert=update");

}elseif(isset($_POST['fitnes'])){
    mysqli_query($koneksi, "update tbl_pengaturan set nama_gym='$nama_fitnes', alamat_gym='$alamat_fitnes', ketua_gym='$ketua_fitnes' where id_pengaturan='$id_fitnes'");
    header("location:profile.php?alert=update");

}
?>