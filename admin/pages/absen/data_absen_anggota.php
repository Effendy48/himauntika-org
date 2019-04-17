<?php 
    $id = $_REQUEST['id'];
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <table class="table">
                        <tr>
                            <th class="title-table-th">Kode Anggota</th>
                            <th class="title-table-th">Nama</th>
                            <th class="title-table-th">Divisi</th>
                            <th class="title-table-th">Datang</th>
                            <th class="title-table-th">Keluar</th>
                        </tr>  
                        <?php 
                            $no = 1;
                            $query = mysqli_query($koneksi->konek(),"SELECT * FROM
                             absen,anggota,divisi,agenda
                             where absen.kode_agenda = agenda.kode_agenda 
                             and absen.kode_anggota = anggota.kode_anggota 
                             and divisi.kd_divisi = anggota.kd_divisi
                             and absen.kode_agenda = $id");
                             
                             while($arr = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td class="title-table-td"><?php echo $no; ?></td>
                            <td class="title-table-td"><?php echo $arr['nama_anggota']; ?></td>
                            <td class="title-table-td"><?php echo $arr['divisi']; ?></td>
                            <td class="title-table-td"><?php echo date('l, d F Y H:i:s',strtotime($arr['jam_masuk'])); ?></td>
                            <td class="title-table-td"><?php echo date('l, d F Y H:i:s',strtotime($arr['jam_keluar'])); ?></td>
                        </tr>
                             <?php $no++;} ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>