<?php
include("koneksi.php");

$j= $_GET['j'];
$idPlg =$_POST['id'];
$jenis = $_POST['jenis'];
$deadline = $_POST['tanggal'];
$catatan = $_POST['catatan'];
$status = '1';

$masuk = date('Y-m-d');

if($j=='1'){
    $harga = "2500000";
}

if($j=='2'){
    $harga = "1500000";
}

if($j=='3'){
    $harga = "2000000";
}

$insert = mysqli_query($koneksi, "INSERT INTO pesanan(id_pelanggan, jenis_order, deadline, catatan_pelanggan, tanggal_masuk, harga, id_status) VALUES('$idPlg', '$jenis', '$deadline', '$catatan', '$masuk', '$harga', '$status')");

header("location:../dashboard/home_pelanggan.php")

?>