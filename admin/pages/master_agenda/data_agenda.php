
<div class="row">
<div class="col-lg-12 col-md-12">
    <p class="text-center" ><a href="#" data-toggle="modal" data-target="#modal-add-agenda"><i class="fa fa-plus"></i> Add Agenda</a></p>
</div>
<?php 
    $query_agenda = $agenda->tampil_agenda();
    while($rec = mysqli_fetch_array($query_agenda)){
?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-calendar text-primary border-primary"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><?php echo $rec['nama_agenda'] ?></div>
                                        <div class="stat-text"><?php echo date('l, d F Y', strtotime($rec['tanggal_agenda'])) ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">

                                <!--Hidden Kode Agenda-->
                                <input type="hidden" id="kode_agenda" value="<?php echo $rec['kode_agenda']; ?>">
                                <!--Hidden Hasil Agenda -->
                                <input type="hidden" id="hasil_agenda" value="<?php echo htmlspecialchars($rec['hasil_agenda']); ?>">
                                        <?php if($rec['status_hasil_agenda'] == "NFIX"){ ?>
                                            <a href="?p=add-hasil-agenda&id=<?php echo $rec['kode_agenda'] ?>&nama_agenda=<?php echo $rec['nama_agenda'] ?>" style="font-size:12px;"><i class="fa fa-paperclip"></i> Add Hasil Agenda</a>
                                        <?php }else{ ?>
                                            <a href="?p=hasil-agenda&id=<?php echo $rec['kode_agenda']; ?>" style="font-size:12px;"><i class="fa fa-poll"></i> Hasil Agenda</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php } ?>                    
</div>
<!--Modal Input Agenda-->
<div class="modal fade" id="modal-add-agenda">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-center"><i class="fa fa-calendar"></i> Agenda</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for=""><i class="fa fa-stream"></i> Agenda</label>
                            <input type="text" class="form-control" name="agenda" placeholder="Agenda" require>
                        </div>
                        <div class="form-group">
                            <label for=""><i class="fa fa-calendar"></i> Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" require>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-paper-plane"></i> Simpan</button>
                        <button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    </form>
                    <?php 
                        if(isset($_POST['simpan'])){
                            $judul_agenda = $_POST['agenda'];
                            $tanggal = $_POST['tanggal'];
                            $agenda->input_agenda($judul_agenda,$tanggal);
                        }
                    ?>
                </div>
            </div>
        </div>
</div>
<!--End Modal Input Agenda-->

<!--Modal Input Hasil Agenda-->
<div class="modal fade" id="modal-add-result-agenda">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-center"><i class="fa fa-calendar"></i>Hasil Agenda</h4>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <!--Hidden Kode Agenda -->
                        <input type="text" id="view_kode_agenda" name="kode_agenda">
                        <div class="form-group">
                            <label for=""><i class="fa fa-stream"></i> Hasil Agenda</label><br>
                            <textarea name="hasil_agenda" class="ckeditor" id="ckeditor" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" name="simpan_hasil_agenda" class="btn btn-info"><i class="fa fa-paper-plane"></i> Simpan</button>
                        <button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    </form>
                    <?php 
                        if(isset($_POST['simpan_hasil_agenda'])){
                            $kode_agenda = $_POST['kode_agenda'];
                            $view_agenda = $_POST['hasil_agenda'];

                            $agenda->input_hasil_agenda($kode_agenda,$view_agenda);
                        }
                    ?>
                </div>
            </div>
        </div>
</div>
<!--End Modal Input Agenda-->
<script>
    var kode_agenda = document.getElementById("kode_agenda").value;
    var hasil_agenda = document.getElementById("hasil_agenda").value;

    var view_kode_agenda = document.getElementById("view_kode_agenda");

    view_kode_agenda.value = kode_agenda;
    document.getElementById("view-hasil-agenda").value = hasil_agenda;

</script>
