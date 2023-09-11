<?php
include("koneksi.php");


if(isset($_GET['id'])){
    $idOrder = $_GET['id'];
    $idStatus = $_GET['s'];
}

if(!isset($_GET['id'])){
$idFull = $_GET['s'];
$idO = substr($idFull,5,-2);
$idStatus = substr($idFull,0,-8);
$idK = substr($idFull,8);
$ida = substr($idFull,2,-6);
}

if($idStatus=='1'){
    $status = '1';
    $edit = mysqli_query($koneksi, "UPDATE pesanan SET id_status='$status' WHERE id_order='$idOrder'");
    if(!isset($_POST['tolak'])){
    header("location:../dashboard/home.php?$idOrder");
    }
    if(isset($_POST['id'])){
    header("location:../views/order_dikerjakan.php");
}

}

if($idStatus=='2'){
    $status = '2';
    $idOrder = $idO;
    $idAnggota = $ida;
    $idDikerjakan = $idK;

    if($idDikerjakan=='1'){
    $edit = mysqli_query($koneksi, "UPDATE pesanan SET id_status='$status', id_anggota='$idAnggota' WHERE id_order='$idOrder'");
    header("location:../views/order_diterima.php");
    }

    if($idDikerjakan=='2'){
        $edit = mysqli_query($koneksi, "UPDATE pesanan SET id_anggota2='$idAnggota' WHERE id_order='$idOrder'");
        header("location:../views/order_diterima.php");
        }

        if($idDikerjakan=='3'){
            $edit = mysqli_query($koneksi, "UPDATE pesanan SET id_anggota3='$idAnggota' WHERE id_order='$idOrder'");
            header("location:../views/order_diterima.php");
            }
}

if($idStatus=='3'){
    $status = '3';
    $link = $_POST['linkdrive'];
    $edit = mysqli_query($koneksi, "UPDATE pesanan SET id_status='$status', linkdrive='$link' WHERE id_order='$idOrder'");
    header("location:../views/riwayat_order.php");
}

if($idStatus=='4'){
    $status = '4';
    $edit = mysqli_query($koneksi, "UPDATE pesanan SET id_status='$status' WHERE id_order='$idOrder'");
    header("location:../dashboard/home.php");
}

if($idStatus=='5'){
    $status = '5';
    $edit = mysqli_query($koneksi, "UPDATE pesanan SET id_status='$status' WHERE id_order='$idOrder'");
    header("location:../dashboard/home.php");
}

if($idStatus=='false'){
    $catatanpelanggan = $_POST['catatan'];
    $edit = mysqli_query($koneksi, "UPDATE pesanan SET catatan_pelanggan='$catatanpelanggan' WHERE id_order='$idOrder'");
    header("location:../dashboard/home_pelanggan.php");
}


?>