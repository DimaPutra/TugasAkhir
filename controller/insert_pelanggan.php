<?php
include("koneksi.php");

$nama = $_POST['nama'];
$email = $_POST['email'];
$hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$pasw = md5($_POST['password']);

$validasi = mysqli_query($koneksi, "SELECT * FROM anggota WHERE email_anggota='$email'");

$validasi2 = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email_pelanggan='$email'");

foreach($validasi as $v){
	if(!empty($v['email_anggota'])){
		$email_lama = $v['email_anggota'];
	}
}

foreach($validasi2 as $v2){
	if(!empty($v2['email_pelanggan'])){
		$email_pelanggan_lama = $v2['email_pelanggan'];
	}
}

if(!empty($email_pelanggan_lama) || !empty($email_lama)){
	header("location:../views/register.php?s=true");
}

if(empty($v['email_anggota']) && empty($email_pelanggan_lama)){
$insert = mysqli_query($koneksi, "INSERT INTO pelanggan(nama_pelanggan, email_pelanggan, no_hp_pelanggan, alamat_pelanggan) VALUES('$nama', '$email', '$hp', '$alamat')");
$select = mysqli_query($koneksi, "SELECT id_pelanggan FROM pelanggan WHERE email_pelanggan='$email' AND no_hp_pelanggan='$hp' AND alamat_pelanggan='$alamat'");
foreach($select as $s){
    $id = $s['id_pelanggan'];
}

$pengguna = mysqli_query($koneksi, "INSERT INTO pengguna(id_konsumen, username, password) VALUES('$id', '$email', '$pasw')");

header("location:../index.php");

}

?>