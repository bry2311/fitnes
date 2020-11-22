<?php
include '../koneksi.php';
$id_member=$_POST['id_member'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jk=$_POST['jk'];
$email=$_POST['email'];
$ultah=$_POST['ultah'];

mysqli_query($koneksi, "update tbl_member set nama_member='$nama',alamat_member='$alamat', jk_member='$jk',email='$email',tanggal_ultah='$ultah' where id_member='$id_member'");
header("location:profile.php?alert=update");
?>