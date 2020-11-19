
<?php
include '../koneksi.php';
session_start();

$kode_member=rand(1000,9999);
$nama_member=$_POST['nama_member'];
$alamat_member=$_POST['alamat_member'];
$jk_member=$_POST['jk_member'];
$nohp_member=$_POST['nohp_member'];
$paket_member=$_POST['paket_member'];
$status="active";
$paket_harga = mysqli_query($koneksi, "select * from tbl_harga where id_harga='$paket_member'");
$ph = mysqli_fetch_array($paket_harga);

$tgl_member=date('Y-m-d');
$d1='+'.$ph['hari_harga'].'days';
$berlaku_member=date('Y-m-d', strtotime($tgl_member. $d1));

mysqli_query($koneksi, "insert into tbl_member 
(kode_member,nama_member,alamat_member,jk_member,hp_member,paket_member,tgl_member,berlaku_member,status_member) values 
('$kode_member','$nama_member','$alamat_member','$jk_member','$nohp_member','$paket_member','$tgl_member','$berlaku_member','$status')");	


$paket_bayar=$ph['nilai_harga'];
$ket_bayar="Daftar member baru, paket ".$ph['kategori_harga'];
mysqli_query($koneksi,"insert into tbl_pembayaran (tgl_pembayaran,jumlah_pembayaran,ket_pembayaran) values('$tgl_member','$paket_bayar','$ket_bayar')");
header("location:member_data.php?alert=add");