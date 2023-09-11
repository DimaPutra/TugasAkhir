<?php



include("header.php");
include("../controller/koneksi.php");

if(!isset($_SESSION['admin'])){
    header("location:../index.php");
}

$idFull = $_GET['a'];
$idDikerjakan = substr($idFull,0,-2);
$idPesanan = substr($idFull,1);

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Penugasan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Penugasan</li>
                        </ol>
                            
                        </div>
                        
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Anggota 
                                
                            </div>
                            
                            <div class="card-body">
                            
                            
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Anggota</th>
                                            <th>Spesialisasi</th>
                                            <th>tugas sedang dikerjakan</th>
                                            <th>tugas selesai dikerjakan</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                            $no=1;
                                            if($idDikerjakan=='1'){
                                                $selectAnggota = mysqli_query($koneksi, "SELECT * FROM anggota 
                                                                            INNER JOIN spesialisasi ON spesialisasi.id_spesialisasi=anggota.id_spesialisasi 
                                                                            ORDER BY anggota.id_anggota ASC");

                                            }

                                            if($idDikerjakan=='2'){
                                            $selectAnggota = mysqli_query($koneksi, "SELECT * FROM anggota 
                                                                            INNER JOIN spesialisasi ON spesialisasi.id_spesialisasi=anggota.id_spesialisasi 
                                                                            
                                                                            WHERE anggota.id_anggota NOT IN (SELECT pesanan.id_anggota FROM pesanan WHERE id_order='$idPesanan') 
                                                                            
                                                                            ORDER BY anggota.id_anggota ASC");
                                            }

                                            if($idDikerjakan=='3'){
                                                $selectAnggota = mysqli_query($koneksi, "SELECT * FROM anggota 
                                                                                INNER JOIN spesialisasi ON spesialisasi.id_spesialisasi=anggota.id_spesialisasi 
                                                                                
                                                                                WHERE anggota.id_anggota NOT IN (SELECT pesanan.id_anggota FROM pesanan WHERE id_order='$idPesanan') 
                                                                                AND anggota.id_anggota NOT IN (SELECT pesanan.id_anggota2 FROM pesanan WHERE id_order='$idPesanan')
                                                                                
                                                                                ORDER BY anggota.id_anggota ASC");
                                                }
                                                
                                            foreach($selectAnggota as $ang){
                                                $idAnggota = $ang['id_anggota'];
                                            ?>
                                        <tr>
                                            
                                            <td><?= $no++;?></td>
                                            <td><?= $ang['nama_anggota'];?></td>
                                            <td><?= $ang['nama_spesialisasi'];?></td>
                                            <td>
                                            <?php 
                                            $dikerjakan = mysqli_query($koneksi, "SELECT COUNT(id_order) dikerjakan FROM pesanan WHERE id_anggota='$idAnggota' OR id_anggota2='$idAnggota' OR id_anggota3='$idAnggota' AND id_status='2'");
                                            foreach($dikerjakan as $kerja){
                                                $totalKerja = $kerja['dikerjakan'];
                                            }
                                            ?>
                                            <?= $totalKerja;?>
                                            </td>
                                            
                                            <td>
                                            <?php 
                                            $selesai = mysqli_query($koneksi, "SELECT COUNT(id_order) selesai FROM pesanan WHERE id_anggota='$idAnggota' AND id_status='3'");
                                            foreach($selesai as $sel){
                                                $totalSelesai = $sel['selesai'];
                                            }
                                            ?>
                                            <?= $totalSelesai;?>

                                            </td>
                                            <td>
                                                <a href="../controller/edit_order.php?s=2a<?=$idAnggota;?>id<?= $idPesanan;?>k<?=$idDikerjakan;?>">tambah tugas</a>
                                                
                                            </td>
                                            
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
</div>

<?php
foreach($selectAnggota as $an){
    $idAn = $an['id_anggota'];
?>
<!-- Modal Hapus Form -->
<div id="hapus<?= $idAn?>" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p href="views/register.php">Apakah Anda yakin menghapus data ?</p>
                <div class="text-center mt-3">
                  <a href="../controller/delete_anggota.php?id=<?=$idAn;?>" class="btn btn-danger">Hapus</a>
                  <button data-bs-dismiss="modal" class="btn btn-Primary">Batal</button>
                </div>
                <div class="form-group mt-3">
                
                </div>
              
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

<?php 
}
?>

<?php
include("footer.php")
?>