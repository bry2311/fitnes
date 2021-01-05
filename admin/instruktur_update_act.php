<?php
include '../koneksi.php';
$id=$_POST['id'];
$name=$_POST['name'];
$foto = date('Y-m-d H:i:s').$_FILES["foto"]["name"];
$target_dir = "../assets/photos/";
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
$namefoto = "";
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    $namefoto = basename($_FILES["foto"]["name"]);
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars($name). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
mysqli_query($koneksi, "update tbl_instruktur set name='$name',photo='$namefoto' where id='$id'");	
header("location:instruktur_data.php");

?>