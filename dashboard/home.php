<!DOCTYPE html>
<html lang="en">
    
<?php 
session_start();
if(!isset($_SESSION['admin'])){
    header("location:../index.php");
}

include("header.php");
include("../controller/koneksi.php");

//hitung order baru
$baru = mysqli_query($koneksi, "SELECT COUNT(id_order) baru FROM pesanan WHERE id_status='1'");
foreach($baru as $bar){
    $totalBaru = $bar['baru'];
}

//hitung order dikerjakan
$dikerjakan = mysqli_query($koneksi, "SELECT COUNT(id_order) dikerjakan FROM pesanan WHERE id_status='2'");
foreach($dikerjakan as $kerja){
    $totalKerja= $kerja['dikerjakan'];
}

//hitung order selesai
$selesai = mysqli_query($koneksi, "SELECT COUNT(id_order) selesai FROM pesanan WHERE id_status='3'");
foreach($selesai as $sel){
    $totalSelesai= $sel['selesai'];
}

//hitung Anggota
$anggota = mysqli_query($koneksi, "SELECT COUNT(id_anggota) member FROM anggota");
foreach($anggota as $ang){
    $totalAnggota= $ang['member'];
}

//order baru
$select = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN status ON status.id_status=pesanan.id_status
                                                        INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan
                                                        WHERE status.id_status='1'");

?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Order Baru
                                    <p><?= $totalBaru?></p>
                                    </div>
                                    
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="home.php">Lihat Detil</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jumlah Order Dikerjakan
                                        <p><?= $totalKerja?></p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../views/order_diterima.php">Lihat Detil</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Jumlah Order Selesai
                                        <p><?= $totalSelesai; ?></p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../views/riwayat_order.php">Lihat detil</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jumlah anggota
                                        <p><?=$totalAnggota;?></p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="anggota.php">Lihat Detil</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Order Baru
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Tanggal Order</th>
                                            <th>Jenis Order</th>
                                            <th>deadline</th>
                                            <th>Dikerjakan Oleh</th>
                                            <th>Status</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                            $no=1;
                                            foreach($select as $s){
                                                $idAnggota = $s['id_anggota'];
                                                $idPesanan = $s['id_order'];
                                            ?>
                                        <tr>
                                        
                                            <td><?= $no++?></td>
                                            <td><?= $s['nama_pelanggan'];?> </td>
                                            <td><?= $s['tanggal_masuk'];?></td>
                                            <td><?= $s['jenis_order'];?></td>
                                            <td><?= $s['deadline'];?></td>

                                            <?php if(empty($idAnggota)){?>
                                            <td>
                                                Belum Ada
                                            </td>
                                            <?php }?>

                                            <?php if(!empty($idAnggota)){?>
                                            <td>}
                                                <?php 
                                                $selectAnggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$idAnggota'");
                                                foreach($selectAnggota as $sa){
                                                ?>
                                                <?= $sa['nama_anggota'];?>
                                                <?php } ?>
                                            </td>
                                            <?php } ?>

                                            <td><?= $s['nama_status'];?></td>
                                            <td><?= $s['harga'];?></td>
                                            <td>
                                                <a data-bs-toggle="modal" data-bs-target="#catatan<?= $idPesanan;?>" href="#catatan<?= $idPesanan;?>">lihat catatan</a>
                                            </td>
                                            
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <?php
foreach($select as $an){
    $idAn = $an['id_order'];
?>
<!-- Modal Hapus Form -->
<div id="catatan<?= $idAn;?>" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Catatan Order</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="../controller/edit_order.php?s=4&id=<?=$idAn;?>">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?= $idAn;?>">
                  <label>nama pelanggan</label>
                  <input type="text" class="form-control" name="nama" readonly value="<?= $an['nama_pelanggan'];?>" >
                </div>
                <div class="form-group mt-3">
                <label>Jenis Order</label>
                  <input type="text" class="form-control" name="jenis" readonly value="<?= $an['jenis_order'];?>">
                </div>

                <div class="form-group mt-3">
                <label>Deadline Order (Digunakan pada)</label>
                  <input type="date" class="form-control" name="tanggal" readonly id="deadline" min="<?php echo date('Y-m-d'); ?>" value="<?= $an['deadline'];?>" placeholder="deadline order">
                </div>

                <div class="form-group mt-3">
                <label>Catatan / Detail Order</label>
                  <textarea type="text" class="form-control" name="catatan" readonly placeholder="catatan/detail order"><?= $an['catatan_pelanggan'];?></textarea>
                </div>
                
                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary">Terima Order</button>
                  <a href="../controller/edit_order.php?s=5&id=<?=$idAn;?>" class="btn btn-danger">Tolak Order</a>
                </div>
                
              </form>
              
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

<?php 
}
?>
                
<?php 
include("footer.php");
?>
