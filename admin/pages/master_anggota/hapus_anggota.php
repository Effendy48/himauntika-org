<?php 
    include "system.php";
    $koneksi = new koneksi();
    $anggota = new anggota();
    $id = $_REQUEST['id'];
    $query = mysqli_query($koneksi->konek(), "DELETE FROM anggota WHERE kode_anggota = '$id'");
             if($query){
                 echo "<script>alert('Berhasil');
                 document.location='?p=anggota'</script>";
             }else{
                 echo "<script>alert('Gagal')</script>";
             }
?>