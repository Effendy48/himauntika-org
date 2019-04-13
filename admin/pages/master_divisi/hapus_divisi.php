<?php 
    include "system.php";
    $koneksi = new koneksi();
    $id = $_REQUEST['id'];
    $query = mysqli_query($koneksi->konek(), "DELETE FROM divisi WHERE kd_divisi = '$id'");
             if($query){
                 echo "<script>alert('Berhasil');
                 document.location='?p=divisi'</script>";
             }else{
                 echo "<script>alert('Gagal')</script>";
             }
?>