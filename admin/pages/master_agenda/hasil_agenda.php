<?php 
    $id = $_REQUEST['id'];
    $query = $agenda->tampil_hasil_agenda($id);
    $rec = mysqli_fetch_array($query);
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title text-center">Hasil Agenda </h4>
                <?php echo htmlspecialchars_decode($rec['hasil_agenda']) ?>
            </div>

        </div>
    </div>
</div>
               