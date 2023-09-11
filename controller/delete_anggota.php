<?php
include("koneksi.php");

$id = $_GET['id'];


$delete = mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota='$id'");
header("location:../dashboard/anggota.php");
?>