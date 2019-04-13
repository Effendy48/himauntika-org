<?php 
    $id = $_REQUEST['id'];
    $query = mysqli_query($koneksi->konek(),"SELECT * FROM divisi WHERE kd_divisi = '$id'");
    $arr = mysqli_fetch_array($query);
?>
<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-project-diagram"></i> Edit Divisi</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Edit Divisi</h3>
                                        </div>
                                        <hr>
                                        <form method="post">
                                            <div class="row">
                                            
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label mb-1"><i class="fa fa-project-diagram"></i> Divisi</label>
                                                    <input name="divisi" type="text" value="<?php echo $arr['divisi'] ?>" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year">
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for=""></label>
                                                    <button type="submit" name="simpan" class="btn btn-info col-4"><i class="fa fa-pencil"></i> Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php 
                                            if(isset($_POST['simpan'])){
                                                $dv = $_POST['divisi'];
                                                
                                                $divisi->edit_divisi($id,$dv);
                                                

                                            }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->