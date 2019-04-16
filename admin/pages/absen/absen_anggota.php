<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php 
                        $date = date('Y-m-d');
                        $query = mysqli_query($koneksi->konek(),"SELECT * FROM agenda WHERE tanggal_agenda ='$date'");
                        $arr = mysqli_fetch_array($query);
                        $kode_agenda = $arr['kode_agenda'];
                        ?>
                        <?php echo date('l, d F Y',strtotime($arr['tanggal_agenda'])) ?>
                    </div>
                    <div class="col-sm-2">
                        <i class="fa fa-calendar"></i> Agenda : 
                    </div>
                    <div class="col-sm-10">
                        <b><?php echo $arr['nama_agenda'] ?></b>
                    </div>
                </div>
                <form method="post">
                <div class="row" style="margin-top:30px;">
                
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" name="rfid" class="form-control" placeholder="Kode Anggota">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-warning" type="submit" name="absen" style="color:#fff;"><i class="fa fa-user"></i> Absen</button>
                    </div>
                    <?php 
                        if(isset($_POST['absen'])){
                            $rfid = $_POST['rfid'];
                            $query = mysqli_query($koneksi->konek(),"SELECT * FROM anggota WHERE kode_rfid = '$rfid'");
                            $row = mysqli_num_rows($query);
                            
                            if($row == 0){
                                echo "<script>alert('Data Tidak Ada');</script>";
                            }else{
                                

                                date_default_timezone_set('Asia/Jakarta');
                                $arr = mysqli_fetch_array($query);
                                $kd_anggota = $arr['kode_anggota'];
                                $jam_masuk = date('Y-m-d H:i:s');
                                $tgl_absen = date('Y-m-d');

                                $query_absen = mysqli_query($koneksi->konek(),"SELECT * FROM 
                                absen,anggota
                                WHERE absen.kode_anggota = anggota.kode_anggota and
                                absen.kode_anggota ='$kd_anggota' and absen.tgl_absen = '$tgl_absen'");
                                $arr_absen = mysqli_fetch_array($query_absen);
                                $num_row = mysqli_num_rows($query_absen);
                               
                                $jam_out = $arr_absen['jam_keluar'];
                                if($jam_out == "KOSONG"){
                                    $jam_keluar = $jam_masuk;
                                    $query_empty_jam_keluar = mysqli_query($koneksi->konek(),"SELECT * FROM absen where kode_anggota ='$kd_anggota' AND jam_keluar = 'KOSONG'");
                                    $rec_jam_keluar = mysqli_fetch_array($query_empty_jam_keluar);
                                    $kd_absen = $rec_jam_keluar['kode_absen'];
                                    $absen->edit_absen($kd_absen,$jam_keluar);
                                    echo "<script>document.location='?p=absen-anggota&rfid=$rfid'(</script>";
                                }elseif($num_row == 0){
                                    $jam_masuk = date('Y-m-d H:i:s');
                                    $tgl_absen = date('Y-m-d');
                                    $absen->input_absen($kd_anggota,$jam_masuk,$kode_agenda,$tgl_absen);
                                    echo "<script>alert('Berhasil')</script>";
                                    
                                }
                            }
                        }
                    ?>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                  <table class="table">
                        <tr>
                            <th>Kode Absen</th>
                            <th>Kode Anggota</th>
                            <th>Nama Anggota</th>
                            <th>Divisi</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                        </tr>
                        <?php 
                            $query = $absen->cek_absen(@$_REQUEST['rfid']);
                            $arr = mysqli_fetch_array($query);
                        ?>
                        <tr>
                            <td><?php echo $arr['kode_absen']; ?></td>
                            <td><?php echo $arr['kode_anggota']; ?></td>
                            <td><?php echo $arr['nama_anggota']; ?></td>
                            <td><?php echo $arr['divisi']; ?></td>
                            <td><?php echo date('l, d F Y H:i:s',strtotime($arr['jam_masuk'])) ?></td>
                            <?php if($arr['jam_keluar'] == "KOSONG"){ ?>
                            <td><b style="color:red;">Belum Keluar</b></td>
                            <?php }else{ ?>
                            <td><?php echo date('l, d F Y H:i:s',strtotime($arr['jam_keluar'])) ?></td>
                            <?php } ?>
                        </tr>    
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>