<?php
include '../koneksi.php';
$id=$_POST['id'];
$name=$_POST['name'];
mysqli_query($koneksi, "update tbl_instruktur set name='$name' where id='$id'");	
header("location:instruktur_data.php");

?>