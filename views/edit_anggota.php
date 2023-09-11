<?php
include("header.php");
include("../controller/koneksi.php");

$idAnggota = $_GET['id'];
$selectAnggota = mysqli_query($koneksi, "SELECT * FROM anggota INNER JOIN spesialisasi ON spesialisasi.id_spesialisasi=anggota.id_spesialisasi WHERE id_anggota='$idAnggota'");
?>
<div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Anggota</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="../controller/edit_anggota.php">
                                            
                                                <?php 
                                                foreach($selectAnggota as $sa){
                                                ?>
                                                    <div class="form-floating mb-3">
                                                        <input type="hidden" name="id" value="<?= $idAnggota;?>">
                                                        <input class="form-control" id="inputFirstName" type="text" name="nama" value="<?= $sa['nama_anggota'];?>" placeholder="Masukan Nama Lengkap" />
                                                        <label for="inputFirstName">Nama Lengkap</label>
                                                    </div>
                                                
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="inputLastName" type="email" name="email" value="<?= $sa['email_anggota'];?>" placeholder="Masukan Email" />
                                                        <label for="inputLastName">Email</label>
                                                    </div>

            
                                            
                                                    <div class="form-floating mb-3">
                                                        
                                                        <?php
                                                        $select = mysqli_query($koneksi, "SELECT * FROM spesialisasi");
                                                        ?>
                                                        <select class="form-control" id="inputPassword" name="spesialisasi">
                                                            <option value="<?= $sa['id_spesialisasi'];?>"><?= $sa['nama_spesialisasi'];?></option>
                                                            <?php foreach($select as $s){?>
                                                            <option value="<?= $s['id_spesialisasi'];?>"><?= $s['nama_spesialisasi'];?></option>
                                                            <?php } ?>
                                                            
                                                        <label for="inputPassword">Spesialisasi Bakat</label>
                                                        </select>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="inputFirstName" type="text" name="detil" placeholder="Detil Kemampuan contoh: edit premiere, edit corel draw dll"><?= $sa['detil'];?></textarea>
                                                        <label for="inputFirstName">Detil</label>
                                                    </div>
                                                
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" name="pasw" placeholder="Abaikan jika tidak ingin mengubah password anda" />
                                                        <label for="inputPasswordConfirm">Password (Abaikan jika tidak ingin mengubah password anda)</label>
                                                    </div>
                                                    <?php } ?>
                                                
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary btn-block" type="submit" value="simpan"></div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            
        
        
    