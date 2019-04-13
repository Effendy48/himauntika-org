
<!-- Orders -->
<div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title text-center">Anggota </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <td align="center" colspan="8" class="text-center">
                                                        <a href="?p=tambah-anggota"><i class="fa fa-plus"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th class="avatar">Avatar</th>
                                                    <th>Kode Anggota</th>
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <th>Gender</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                            <?php 
                                                $no = 1;
                                                $query_anggota = $anggota->tampil_anggota();
                                                while($arr = mysqli_fetch_array($query_anggota)){
                                            ?>
                                                <tr>
                                                    <td class="serial"><?php echo $no; ?></td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td> <?php echo $arr['nim_anggota'] ?> </td>
                                                    <td>  <span class="name"><?php echo $arr['nama_anggota'] ?></span> </td>
                                                    <td> <span class="product"><?php echo $arr['divisi'] ?></span> </td>
                                                    <td><?php echo $arr['jenkel_anggota'] ?></td>
                                                    <td>
                                                    
                                                        <a href=""><span class="badge badge-complete"><i class="fa fa-user"></i></span></a>
                                                        <a href="?p=hapus-anggota&id=<?php echo $arr['kode_anggota'] ?>"><span class="badge badge-danger"><i class="fa fa-times"></i></span></a>
                                                        <a href="?p=edit-anggota&id=<?php echo $arr['kode_anggota'] ?>"><span class="badge badge-info"><i class="fa fa-pencil-alt"></i></span></a>
                                                    
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
               