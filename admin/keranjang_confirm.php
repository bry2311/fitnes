<?php
include '../koneksi.php';
session_start();

if(isset($_GET['id'])) {	
	$tgl_bayar=date('Y-m-d');
	$id = $_GET['id'];
	$jenis = $_GET['jenis'];
	$jml = 0;
	$ket = "";
	$id_member = 0;
	$data2 = mysqli_query($koneksi,"SELECT * FROM tbl_order WHERE id_order = $id");
	while($d2 = mysqli_fetch_array($data2)){
		$jml = $d2['harga_order'];
		$ket = $d2['nama_order'];
		$id_member = $d2['id_customer'];
		if($d2['jenis_order'] == "paket"){
			$paket_member=$d2['kode_order'];
			$paket_harga = mysqli_query($koneksi, "select * from tbl_harga where id_harga='$paket_member'");
			$ph = mysqli_fetch_array($paket_harga);
			$member = mysqli_query($koneksi, "select * from tbl_member where id_member='$id_member'");
			$mb = mysqli_fetch_array($member);
			$tgl_member= $mb['berlaku_member'];
			$d1='+'.$ph['hari_harga'].'days';
			$berlaku_member=date('Y-m-d', strtotime($tgl_member. $d1));
			mysqli_query($koneksi, "update tbl_member set paket_member='$paket_member', tgl_member='$tgl_member', berlaku_member='$berlaku_member' where id_member='$id_member'");
		}
	}
	mysqli_query($koneksi,"insert into tbl_pembayaran (id_member,tgl_pembayaran,jumlah_pembayaran,ket_pembayaran) values('$id_member','$tgl_bayar','$jml','$ket')");
	mysqli_query($koneksi,"delete from tbl_order where id_order = $id");
	header("location:order_data.php");

}else{
	header("location:order_data.php");
}


?>