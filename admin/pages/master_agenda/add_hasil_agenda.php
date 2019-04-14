<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title text-center">Add Hasil Agenda </h4>
                <div class="row">
                    <div class="col-sm-12">
                    <form method="post">
                        <div class="form-group">
                            <label for="">Agenda</label>
                            <input type="text" value="<?php echo $_REQUEST['nama_agenda']; ?>" class="form-control" style="border-top:0;border-right:0;border-left:0;background:#fff;" readonly>
                        </div>
                        <div class="form-group">
                            <textarea name="hasil_agenda" id="ckeditor" class="ckeditor"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-paper-plane"></i> Simpan</button>
                        </div>
                    </form>   
                    <?php 
                        if(isset($_POST['simpan'])){
                            $id = $_REQUEST['id'];
                            $hasil_agenda = $_POST['hasil_agenda'];
                            $agenda->input_hasil_agenda($id,$hasil_agenda);
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('ckeditor',{
        width:'70%',
        height:800
    });
</script>
               