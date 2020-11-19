<?php 
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);

	$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE user_admin='$username' AND pass_admin='$password'");
	$cek = mysqli_num_rows($login);
	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		if($data['status_admin']=="aktif"){
			$_SESSION['id'] = $data['id_admin'];
			$_SESSION['nama'] = $data['nama_admin'];
			$_SESSION['username'] = $data['user_admin'];
			$_SESSION['login'] = "admin";
			header("location:admin/");
		}else{
			header("location:login.php?alert=nonaktif");
		}
		
	}else{
		header("location:login.php?alert=gagal");
	}



?>