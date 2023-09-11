<?php



include("header.php");
include("../controller/koneksi.php");

if(!isset($_SESSION['admin'])){
    header("location:../index.php");
}
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Anggota</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Anggota</li>
                        </ol>
                        
                        <a href="../views/insert_anggota.php" class="btn btn-primary">tambah anggota</a>
                            
                        </div>
                        
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Anggota Aktif
                                
                            </div>
                            
                            <div class="card-body">
                            
                            
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Anggota</th>
                                            <th>Email</th>
                                            <th>Spesialisasi</th>
                                            <th>detil</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                            $no=1;
                                            $selectAnggota = mysqli_query($koneksi, "SELECT * FROM anggota 
                                                                            INNER JOIN spesialisasi ON spesialisasi.id_spesialisasi=anggota.id_spesialisasi 
                                                                            ORDER BY id_anggota ASC");
                                            foreach($selectAnggota as $ang){
                                                $idAnggota = $ang['id_anggota'];
                                            ?>
                                        <tr>
                                            
                                            <td><?= $no++;?></td>
                                            <td><?= $ang['nama_anggota'];?></td>
                                            <td><?= $ang['email_anggota'];?></td>
                                            <td><?= $ang['nama_spesialisasi'];?></td>
                                            <td><?= $ang['detil'];?></td>
                                            <td>
                                                <a href="../views/edit_anggota.php?id=<?= $idAnggota;?>"><i class="fas fa-edit"></i></a>
                                                <a data-bs-toggle="modal" data-bs-target="#hapus<?= $idAnggota;?>" href="#hapus<?= $idAnggota;?>"><i class="fas fa-trash"></i></a>
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