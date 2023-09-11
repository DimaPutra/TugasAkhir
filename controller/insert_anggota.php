<?php
include("koneksi.php");

$nama = $_POST['nama'];
$email = $_POST['email'];
$spesialisasi = $_POST['spesialisasi'];
$pasw = md5($_POST['pasw']);
$foto = "default1.png";
$detil = $_POST['detil'];

$validasi1 = mysqli_query($koneksi, "SELECT * FROM anggota WHERE email_anggota='$email'");

$validasi2 = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email_pelanggan='$email'");

foreach($validasi1 as $v){
	if(!empty($v['email_anggota'])){
		$email_lama = $v['email_anggota'];
	}
}

foreach($validasi2 as $v2){
	if(!empty($v2['email_pelanggan'])){
		$email_pelanggan_lama = $v2['email_pelanggan'];
	}
}

if(!empty($email_lama) || !empty($email_pelanggan_lama)){
	header("location:../views/insert_anggota.php?s=true");
}

if(empty($v['email_anggota']) && empty($email_pelanggan_lama)){
$insert = mysqli_query($koneksi, "INSERT INTO anggota(nama_anggota, email_anggota, id_spesialisasi, foto, detil) VALUES('$nama', '$email', '$spesialisasi', '$foto', '$detil')");
$select = mysqli_query($koneksi, "SELECT id_anggota FROM anggota WHERE email_anggota='$email' AND nama_anggota='$nama' AND id_spesialisasi='$spesialisasi'");
foreach($select as $s){
    $id = $s['id_anggota'];
}

$pengguna = mysqli_query($koneksi, "INSERT INTO pengguna(id_anggota, username, password) VALUES('$id', '$email', '$pasw')");

header("location:../dashboard/anggota.php");
}
?>