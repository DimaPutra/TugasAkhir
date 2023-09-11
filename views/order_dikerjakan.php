<!DOCTYPE html>
<html lang="en">

<?php 

include("../controller/koneksi.php");
session_start();



if(isset($_SESSION['pelanggan'])){
    $idPlg = $_SESSION['pelanggan'];
    $select = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan
                                                            INNER JOIN anggota ON pesanan.id_anggota=anggota.id_anggota
                                                            INNER JOIN status ON pesanan.id_status=status.id_status
                                                            WHERE pesanan.id_pelanggan='$idPlg' AND status.id_status='3'");
}

if(isset($_SESSION['admin'])){
    $idAdmin = $_SESSION['admin'];
    $select = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan
                                                            INNER JOIN status ON pesanan.id_status=status.id_status
                                                            WHERE status.id_status='4'");
}

if(isset($_SESSION['anggota'])){
    $idAng = $_SESSION['anggota'];

    $selectAng = mysqli_query($koneksi, "SELECT id_order, id_anggota, id_anggota2, id_anggota3, id_status FROM pesanan WHERE id_anggota='$idAng' AND id_status='2'");
    foreach($selectAng as $sa){
        $order = $sa['id_order'];
        $ang1 = $sa['id_anggota'];
        
    }


    if($ang1!=$idAng){
         $selectAng = mysqli_query($koneksi, "SELECT id_order, id_anggota, id_anggota2, id_anggota3, id_status FROM pesanan WHERE id_anggota2='$idAng' AND id_status='2'");
    foreach($selectAng as $sa){
        $order = $sa['id_order'];
        $ang2 = $sa['id_anggota2'];
        
    }
    }

    if(empty($ang2)){
        $selectAng = mysqli_query($koneksi, "SELECT id_order, id_anggota, id_anggota2, id_anggota3, id_status FROM pesanan WHERE id_anggota3='$idAng' AND id_status='2'");
    foreach($selectAng as $sa){
        $order = $sa['id_order'];
        $ang3 = $sa['id_anggota3'];
        
    }
    }


    if(!empty($ang1) && $ang1==$idAng && !empty($order)){
    $select = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan
                                                            INNER JOIN anggota ON pesanan.id_anggota=anggota.id_anggota
                                                            INNER JOIN status ON pesanan.id_status=status.id_status
                                                            WHERE pesanan.id_anggota='$idAng' AND status.id_status='2'");
    }

    if(!empty($ang2) && $ang2==$idAng && !empty($order)){
    $select = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan
                                                            INNER JOIN anggota ON pesanan.id_anggota2=anggota.id_anggota
                                                            INNER JOIN status ON pesanan.id_status=status.id_status
                                                            WHERE pesanan.id_anggota2='$idAng' AND status.id_status='2'");
    }

    if(!empty($ang3) && $ang3==$idAng && !empty($order)){
    $select = mysqli_query($koneksi, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan
                                                            INNER JOIN anggota ON pesanan.id_anggota3=anggota.id_anggota
                                                            INNER JOIN status ON pesanan.id_status=status.id_status
                                                            WHERE pesanan.id_anggota3='$idAng' AND status.id_status='2'");
    }
    
}


include("header.php");



?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Order Dikerjakan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Order Dikerjakan</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Status Order
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
                                            if(!empty($select)){
                                            foreach($select as $s){
                                                if(!empty($ang1) && $ang1==$idAng){
                                                $idAnggota = $s['id_anggota'];
                                                }

                                                if(!empty($ang2) && $ang2==$idAng){
                                                $idAnggota = $s['id_anggota2'];
                                                }

                                                if(!empty($ang3) && $ang3==$idAng){
                                                $idAnggota = $s['id_anggota3'];
                                                }



                                                $idPesanan = $s['id_order'];
                                            ?>
                                        <tr>
                                            
                                            <td><?= $no++?></td>
                                            <td><?= $s['nama_pelanggan'];?> </td>
                                            <td><?= $s['tanggal_masuk'];?></td>
                                            <td><?= $s['jenis_order'];?></td>
                                            <td><?= $s['deadline'];?></td>
                                            <td><?= $s['nama_anggota'];?></td>
                                            

                                            <td><?= $s['nama_status'];?></td>
                                            <td><?= $s['harga'];?></td>
                                            <td>
                                                <a data-bs-toggle="modal" data-bs-target="#catatan<?= $idPesanan;?>" href="#catatan<?= $idPesanan;?>" >lihat catatan</a><br>
                                                <a data-bs-toggle="modal" data-bs-target="#upload<?= $idPesanan;?>" href="#upload<?= $idPesanan;?>"><i class="fas fa-upload"></i></a>
                                                <a data-bs-toggle="modal" data-bs-target="#tolak<?= $idPesanan;?>" href="#tolak<?= $idPesanan;?>"><i class="fas fa-times"></i></a>
                                            </td>
                                            

                                        </tr>
                                        <?php } }?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
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
            <form method="POST" action="../controller/edit_order.php?s=3">
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
                  <input type="submit" value="order selesai" class="btn btn-primary">
                  
                </div>
                
              </form>
              
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->



      <div id="upload<?= $idPesanan;?>" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Masukan Link Drive</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="../controller/edit_order.php?s=3">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?= $idPesanan;?>">
                  <label>Link Drive</label>
                  <input type="text" class="form-control" name="linkdrive" value="<?= $s['linkdrive'];?>" >
                </div>
                
                
                <div class="text-center mt-3">
                  <input type="submit" value="order selesai" class="btn btn-primary">
                  
                </div>
                
              </form>
              
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <div id="tolak<?= $idPesanan;?>" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Yakin Menolak Pesanan</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="../controller/edit_order.php?s=1&id=<?=$idPesanan;?>">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?= $idPesanan;?>">
                  <input type="hidden" name="tolak" value="true">
                  
                </div>
                
                
                <div class="text-center mt-3">
                  <input type="submit" value="Tolak" class="btn btn-primary">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                  
                </div>
                
              </form>
              
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->


<?php 
}
?>