<?php
include "../koneksi.php";

$id=$_POST['id_member_panjang'];
$paket_member=$_POST['paket_member_panjang'];

$paket_harga = mysqli_query($koneksi, "select * from tbl_harga where id_harga='$paket_member'");
$ph = mysqli_fetch_array($paket_harga);

$tgl_member=date('Y-m-d');
$d1='+'.$ph['hari_harga'].'days';
$berlaku_member=date('Y-m-d', strtotime($tgl_member. $d1));

mysqli_query($koneksi, "update tbl_member set paket_member='$paket_member', tgl_member='$tgl_member', berlaku_member='$berlaku_member' where id_member='$id'");

$paket_bayar=$ph['nilai_harga'];
$ket_bayar="Perpanjangan member, paket ".$ph['kategori_harga'];
mysqli_query($koneksi,"insert into tbl_pembayaran (tgl_pembayaran,jumlah_pembayaran,ket_pembayaran,id_member) values('$tgl_member','$paket_bayar','$ket_bayar','$id_member')");

header("location:member_data.php?alert=update");
//a

?>