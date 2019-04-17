
<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-users"></i> Tambah Anggota</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Tambah Anggota</h3>
                                        </div>
                                        <hr>
                                        <form method="post">
                                            <div class="row">
                                                <div class="form-group col-sm-3 col-6">
                                                    <label class="control-label mb-1"><i class="fa fa-id-card"></i> NIM</label>
                                                    <input name="nim" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="NIM">
                                                </div>
                                                <div class="form-group col-sm-6 has-success">
                                                    <label class="control-label mb-1"><i class="fa fa-user"></i> Nama Anggota</label>
                                                    <input name="nama" type="text" class="form-control cc-name valid" data-val="true" aria-required="true" aria-invalid="false" aria-describedby="cc-name" placeholder="Nama">
                                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="cc-number" class="control-label mb-1"><i class="fa fa-male"></i> Jenis Kelamin</label>
                                                    <select name="jenkel" class="form-control" id="">
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="L">Laki - Laki</option>
                                                        <option value="P">Perempuan </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label mb-1"><i class="fa fa-map-marker"></i> Alamat</label>
                                                    <input name="alamat" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Alamat">
                                                    
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label mb-1"><i class="fa fa-phone"></i> No Telephone</label>
                                                    <input name="no_telp" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" placeholder="No Telephone">
                                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="cc-number" class="control-label mb-1"><i class="fa fa-briefcase"></i> Jabatan</label>
                                                    <select name="divisi" id="" class="form-control">
                                                    <option>Pilih Jabatan</option>
                                                    <?php 
                                                    foreach($divisi->tampil_divisi() as $divisi){
                                                    ?>
                                                    <option value="<?php echo $divisi['kd_divisi'] ?>"><?php echo $divisi['divisi']; ?></option>        
                                                    <?php } ?>
                                                    </select>
                                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label mb-1"><i class="fa fa-envelope"></i> Email</label>
                                                    <input name="email" type="email" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" placeholder="Email">
                                                    
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label class="control-label mb-1"><i class="fa fa-map-marker"></i> Tempat Lahir</label>
                                                    <input name="tempat_lahir" type="text" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" placeholder="Tempat Lahir ">
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="cc-number" class="control-label mb-1"><i class="fa fa-calendar"></i> Tanggal Lahir</label>
                                                    <input name="tgl_lahir" type="date" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number">
                                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="cc-number" class="control-label mb-1"><i class="fa fa-school"></i> Semester</label>
                                                    <input type="text" name="semester" class="form-control cc-number identified visa" value="" placeholder="Semester">
                                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="cc-number" class="control-label mb-1"><i class="fa fa-id-card"></i> Kode RFID</label>
                                                    <input type="text" name="kode_rfid" class="form-control cc-number identified visa" value="" placeholder="Kode RFID">
                                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" name="simpan" class="btn btn-info col-sm-12"><i class="fa fa-pencil-alt"></i> Simpan</button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button class="btn btn-danger col-sm-6"><i class="fa fa-times"></i> Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php 
                                            if(isset($_POST['simpan'])){
                                                $kode = $_POST['kode'];
                                                $nim = $_POST['nim'];
                                                $nama = $_POST['nama'];
                                                $jenkel = $_POST['jenkel'];
                                                $alamat = $_POST['alamat'];
                                                $no_telp = $_POST['no_telp'];
                                                $divisi = $_POST['divisi'];
                                                $email = $_POST['email'];
                                                $tempat_lahir = $_POST['tempat_lahir'];
                                                $tgl_lahir = $_POST['tgl_lahir'];
                                                $semester = $_POST['semester'];
                                                $kode_rfid = $_POST['kode_rfid'];
                                                
                                                $anggota->input_anggota(
                                                 $nim,
                                                 $nama,
                                                 $alamat,
                                                 $jenkel,
                                                 $no_telp,
                                                 $email,
                                                 $divisi,
                                                 $tempat_lahir,
                                                 $tgl_lahir,
                                                 $semester,
                                                 $kode_rfid);
                                                

                                            }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->