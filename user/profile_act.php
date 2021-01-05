<?php
include '../koneksi.php';
session_start();
$id_member=$_POST['id_member'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jk=$_POST['jk'];
$email=$_POST['email'];
$ultah=$_POST['ultah'];
$foto = date('Y-m-d H:i:s').$_FILES["foto"]["name"];
$target_dir = "../images/photoMember/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["foto"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}
$name = "";
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    $name = basename($_FILES["foto"]["name"]);
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars($name). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$_SESSION['foto'] = $name;


mysqli_query($koneksi, "update tbl_member set nama_member='$nama',alamat_member='$alamat', jk_member='$jk',email='$email',tanggal_ultah='$ultah',foto_member='$name' where id_member='$id_member'");
header("location:profile.php?alert=update");
?>