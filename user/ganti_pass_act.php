<?php
include '../koneksi.php';


$id_member=$_POST['id_member'];
$pass_member=md5($_POST['password']);


mysqli_query($koneksi, "update tbl_member set password='$pass_member' where id_member='$id_member'")or die(mysqli_errno());
header("location:ganti_pass.php?alert=update");

?>