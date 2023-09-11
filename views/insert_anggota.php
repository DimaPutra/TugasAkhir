<?php
include("header.php");
include("../controller/koneksi.php");
?>
<div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Anggota Baru</h3></div>
                                    <?php 
                            if(isset($_GET['s'])){
                        ?>
                        <alert class="alert alert-danger">Email Sudah Digunakan</alert>
                        <?php } ?>
                                    <div class="card-body">
                                        <form method="post" action="../controller/insert_anggota.php">
                                            
                                                
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="inputFirstName" type="text" name="nama" placeholder="Masukan Nama Lengkap" />
                                                        <label for="inputFirstName">Nama Lengkap</label>
                                                    </div>
                                                
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="inputLastName" type="email" name="email" placeholder="Masukan Email" />
                                                        <label for="inputLastName">Email</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="inputLastName" type="text" name="alamat" placeholder="Masukan Alamat" />
                                                        <label for="inputLastName">Alamat</label>
                                                    </div>
                                            
                                                    <div class="form-floating mb-3">
                                                        
                                                        <?php
                                                        $select = mysqli_query($koneksi, "SELECT * FROM spesialisasi");
                                                        ?>
                                                        <select class="form-control" id="inputPassword" name="spesialisasi">
                                                            <option value="">--pilih spesialisasi--</option>
                                                            <?php foreach($select as $s){?>
                                                            <option value="<?= $s['id_spesialisasi'];?>"><?= $s['nama_spesialisasi'];?></option>
                                                            <?php } ?>
                                                            
                                                        <label for="inputPassword">Spesialisasi Bakat</label>
                                                        </select>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="inputFirstName" type="text" name="detil" placeholder="Detil Kemampuan contoh: edit premiere, edit corel draw dll"></textarea>
                                                        <label for="inputFirstName">Detil</label>
                                                    </div>
                                                
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" name="pasw" placeholder="Masukan password" />
                                                        <label for="inputPasswordConfirm">Password</label>
                                                    </div>
                                                
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary btn-block" type="submit" value="simpan"></div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            
        
        
    