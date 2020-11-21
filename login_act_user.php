<?php 
include 'koneksi.php';
$username = $_POST['nomer'];
$password = md5($_POST['password']);

	$login = mysqli_query($koneksi, "SELECT * FROM tbl_member WHERE hp_member='$username' AND password='$password'");
	$cek = mysqli_num_rows($login);
	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		if($data['status_member']=="aktif"){
			$_SESSION['id'] = $data['id_member'];
			$_SESSION['nama'] = $data['nama_member'];
			$_SESSION['kode'] = $data['kode_member'];
			$_SESSION['login'] = "user";
			header("location:user/");
		}else{
			header("location:loginUser.php?alert=nonaktif");
		}
		
	}else{
		header("location:loginUser.php?alert=gagal");
	}



?>