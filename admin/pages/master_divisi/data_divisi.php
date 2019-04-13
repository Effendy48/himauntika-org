
<!-- Orders -->
<div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title text-center">Divisi </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <td align="center" colspan="8" class="text-center"><a href="?p=input-divisi" data-toggle="modal" data-target="#tambah-divisi"><i class="fa fa-plus"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>Kode Divisi</th>
                                                    <th>Divisi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                            <?php 
                                                $no = 1;
                                                $query_divisi = $divisi->tampil_divisi();
                                                while($arr = mysqli_fetch_array($query_divisi)){
                                            ?>
                                                <tr>
                                                    <td class="serial"><?php echo $no; ?></td>
                                                    <td> DV<?php echo $arr['kd_divisi'] ?> </td>
                                                    <td> <span class="product"><?php echo $arr['divisi'] ?></span> </td>
                                                    <td>
                                                    
                                                        <a href="?p=hapus-divisi&id=<?php echo $arr['kd_divisi'] ?>"><span class="badge badge-danger"><i class="fa fa-times"></i></span></a>
                                                        <a href="?p=edit-divisi&id=<?php echo $arr['kd_divisi'] ?>"><span class="badge badge-info"><i class="fa fa-pencil-alt"></i></span></a>
                                                    
                                                    </td>
                                                </tr>
                                                <?php $no++;} ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
                <!-- /.orders -->
                <!--Modal Divisi -->   
                <div class="modal fade" id="tambah-divisi">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label for=""><i class="fa fa-ticket"></i> Nim Anggota</label>
                                        <input type="text" class="form-control" name="nim" placeholder="Nim Anggota">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="fa fa-user"></i> Nama Anggota</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Anggota">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="fa fa-briefcase"></i> Jabatan</label>
                                        <select class="form-control" name="jabatan">
                                            <option>Pilih Jabatan</option>
                                            <?php 
                                            foreach($divisi->view_divisi() as $divisi){
                                            ?>
                                            <option value="<?php echo $divisi['kd_divisi'] ?>"><?php echo $divisi['divisi']; ?></option>        
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="fa fa-map-marker"></i> Alamat Anggota</label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat Anggota">  
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="fa fa-male"></i> Jenis Kelamin</label>
                                        <select class="form-control" name="jenkel">
                                            <option>Pilih Jenis Kelamin</option>
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="fa fa-phone"></i> No Telp Anggota</label>
                                        <input type="text" class="form-control" name="no_telp" placeholder="No Telp Anggota">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="fa fa-envelope"></i> Email Anggota</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email Anggota">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="fa fa-map-marker"></i> Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="fa fa-calendar"></i> Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="fa fa-briefcase"></i> Semester</label>
                                        <input type="text" class="form-control" name="semester" placeholder="Nama Anggota">    
                                    </div>
                                    <button type="submit" name="simpan" class="simpan">Simpan</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </form>
                                <?php 
                                    if(isset($_POST['simpan'])){
                                        $nim = $_POST['nim'];
                                        $nama = $_POST['nama'];
                                        $jabatan = $_POST['jabatan'];
                                        $alamat = $_POST['alamat'];
                                        $jenkel = $_POST['jenkel'];
                                        $no_telp = $_POST['no_telp'];
                                        $email = $_POST['email'];
                                        $foto = null;
                                        $tempat_lahir = $_POST['tempat_lahir'];
                                        $tgl_lahir = $_POST['tgl_lahir'];
                                        $semester = $_POST['semester'];

                                        $anggota->input_anggota($nim,
                                        $nama,
                                        $alamat,
                                        $jenkel,
                                        $no_telp,
                                        $email,
                                        $jabatan,
                                        $foto,
                                        $tempat_lahir,
                                        $tgl_lahir,
                                        $semester);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal Anggota -->