<?php
include '../koneksi.php';


$id_admin=$_POST['id_admin'];
$pass_admin=md5($_POST['pass_admin']);


mysqli_query($koneksi, "update admin set pass_admin='$pass_admin' where id_admin='$id_admin'")or die(mysqli_errno());
header("location:ganti_pass.php?alert=update");

?>