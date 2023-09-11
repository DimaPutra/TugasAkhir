<?php 
session_start();
include("koneksi.php");

$username = $_POST['username'];
$password = md5($_POST['pasw']);

$login = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");

while($data = mysqli_fetch_array($login)){
    $admin = $data['id_admin'];
    $pelanggan = $data['id_konsumen'];
    $anggota = $data['id_anggota'];
}

if(isset($admin)){
    $_SESSION['admin'] = $admin;
    header("location:../dashboard/home.php");
}elseif(isset($pelanggan)){
    $_SESSION['pelanggan'] = $pelanggan;
    header("location:../index.php");
}elseif(isset($anggota)){
    $_SESSION['anggota'] = $anggota;
    header("location:../dashboard/home_anggota.php");
}else{
    header("location:../index.php?id=$admin");
}