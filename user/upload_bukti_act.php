<?php
include '../koneksi.php';
session_start();
$target_dir = "../images/bukti/";
$target_file = $target_dir . basename($_FILES["bukti"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["bukti"]["tmp_name"]);
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
    $name = basename($_FILES["bukti"]["name"]);
    if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars($name). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$id = $_SESSION['id'];
mysqli_query($koneksi,"insert into tbl_bukti (bukti,id_member) values('$name','$id')");
header("location:order_data.php?alert=update");
//update
?>