<?php
include "../koneksi.php";

$id=$_POST['id_member_panjang'];
$paket_member=$_POST['paket_member_panjang'];

$paket_harga = mysqli_query($koneksi, "select * from tbl_harga where id_harga='$paket_member'");
$ph = mysqli_fetch_array($paket_harga);

$member = mysqli_query($koneksi, "select * from tbl_member where id_member='$id'");
$mb = mysqli_fetch_array($member);
$tgl_member= $mb['berlaku_member'];
$d1='+'.$ph['hari_harga'].'days';
$berlaku_member=date('Y-m-d', strtotime($tgl_member. $d1));

$tanggal_hari_ini = new DateTime(date('Y-m-d'));
$berlaku_member_dt = new DateTime(date('Y-m-d', strtotime($tgl_member)));
$besar_denda = 1000;
$total_denda = 0;
if($berlaku_member_dt < $tanggal_hari_ini){
    $penalti_hari = $tanggal_hari_ini->diff($berlaku_member_dt)->days;
    $total_denda = $besar_denda * $penalti_hari;
}

mysqli_query($koneksi, "update tbl_member set paket_member='$paket_member', tgl_member='$tgl_member', berlaku_member='$berlaku_member' where id_member='$id'");

$paket_bayar=$ph['nilai_harga'];
$paket_bayar+= $total_denda;
$ket_bayar="Perpanjangan member, paket ".$ph['kategori_harga'];
mysqli_query($koneksi,"insert into tbl_pembayaran (tgl_pembayaran,jumlah_pembayaran,ket_pembayaran,id_member) values('$tgl_member','$paket_bayar','$ket_bayar','$id_member')");

header("location:member_data.php?alert=update");
//a

?>