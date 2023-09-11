<?php
include("koneksi.php");

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$spesialisasi = $_POST['spesialisasi'];

$foto = "default1.png";

$detil = $_POST['detil'];



$update = mysqli_query($koneksi, "UPDATE anggota SET nama_anggota='$nama', email_anggota='$email', id_spesialisasi='$spesialisasi', detil='$detil' WHERE id_anggota='$id'");


if(empty($_POST['pasw'])){
$pengguna = mysqli_query($koneksi, "UPDATE pengguna SET username='$email' WHERE id_anggota='$id'");
}

if(!empty($_POST['pasw'])){
    $pasw = md5($_POST['pasw']);
    $pengguna = mysqli_query($koneksi, "UPDATE pengguna SET username='$email', password='$pasw' WHERE id_anggota='$id'");
}

header("location:../dashboard/anggota.php");

?>