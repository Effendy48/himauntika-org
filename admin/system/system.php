<?php 
    class koneksi{
        function konek(){
            return mysqli_connect('localhost','root','','himauntika_org');
        }
    }
    
    class anggota{
        function input_anggota($nim_anggota,$nama_anggota,$alamat_anggota,$jenkel_anggota, $no_telp_anggota, $email_anggota, $kd_divisi,$foto_anggota, $tempat_lahir,$tgl_lahir,$semester){
          $koneksi = new koneksi();
          $query = mysqli_query($koneksi->konek(), "INSERT INTO anggota(nim_anggota,nama_anggota,alamat_anggota,jenkel_anggota,no_telp_anggota,email_anggota,kd_divisi,foto_anggota,tempat_lahir,tgl_lahir,semester)
             values('$nim_anggota','$nama_anggota','$alamat_anggota','$jenkel_anggota','$no_telp_anggota','$email_anggota','$kd_divisi','$foto_anggota','$tempat_lahir','$tgl_lahir','$semester')");
             if($query){
                 echo "<script>alert('Berhasil');
                 document.location='?p=anggota'</script>";
             }else{
                 echo "<script>alert('Gagal')</script>";
             }
        }
        
        function tampil_anggota(){
            $koneksi = new koneksi();
            $query_anggota = mysqli_query($koneksi->konek(),"SELECT * FROM anggota,divisi WHERE anggota.kd_divisi = divisi.kd_divisi");
            return $query_anggota;
        }
        function edit_anggota($id, $nim_anggota,$nama_anggota,$alamat_anggota,$jenkel_anggota, $no_telp_anggota, $email_anggota, $kd_divisi,$tempat_lahir,$tgl_lahir,$semester){
            $koneksi = new koneksi();
            $query = mysqli_query($koneksi->konek(),"UPDATE anggota SET nim_anggota = '$nim_anggota',nama_anggota = '$nama_anggota',
            alamat_anggota='$alamat_anggota',jenkel_anggota='$jenkel_anggota',no_telp_anggota='$no_telp_anggota', email_anggota='$email_anggota',
            kd_divisi='$kd_divisi',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',semester='$semester' WHERE kode_anggota='$id'");
            if($query){
                echo "<script>alert('Berhasil');
                document.location='?p=anggota'</script>";
            }else{
                echo "<script>alert('Gagal')</script>";
            }
        }
        function count_anggota(){
            $koneksi = new koneksi();
            $count_anggota = mysqli_query($koneksi->konek(),"SELECT COUNT('kode_anggota') as count_anggota FROM anggota");
            $row_count = mysqli_num_rows($count_anggota);
            return "2";
        }
        
    }
    class divisi{
        function tampil_divisi(){
            $koneksi = new koneksi();
            $query_divisi = mysqli_query($koneksi->konek(),"SELECT * FROM divisi");
            return $query_divisi;
        }
        function input_divisi($divisi){
            $koneksi = new koneksi();
            $query_input_divisi = mysqli_query($koneksi->konek(),"INSERT INTO divisi(divisi)values('$divisi')");
            if($query_input_divisi){
                echo "<script>alert('Berhasil');
                document.location='?p=divisi'</script>";
            }else{
                echo "<script>alert('Gagal')</script>";
            }
        }
        function edit_divisi($id,$divisi){
            $koneksi = new koneksi();
            $query_edit_divisi = mysqli_query($koneksi->konek(),"UPDATE divisi set divisi = '$divisi' where kd_divisi = '$id'");
            if($query_edit_divisi){
                echo "<script>alert('Berhasil');
                document.location='?p=divisi'</script>";
            }else{
                echo "<script>alert('Gagal')</script>";
            }
        }
    }
    class agenda{
        function input_agenda($agenda,$tgl_agenda){
            $koneksi = new koneksi();
            $query_agenda = mysqli_query($koneksi->konek(),"INSERT INTO agenda(nama_agenda,tanggal_agenda,status_hasil_agenda)values('$agenda','$tgl_agenda','NFIX')");
            if($query_agenda){
                echo "<script>alert('Berhasil');
                document.location='?p=agenda'</script>";
            }else{
                echo "<script>alert('Gagal')</script>";
            }
        }
        function input_hasil_agenda($id,$agenda){
            $koneksi = new koneksi();
            $query_hasil = mysqli_query($koneksi->konek(),"UPDATE agenda SET hasil_agenda = '$agenda', status_hasil_agenda='FIX' WHERE kode_agenda = '$id'");
            if($query_agenda){
                echo "<script>alert('Berhasil');
                document.location='?p=agenda'</script>";
            }else{
                echo "<script>alert('Gagal')</script>";
            }
        }
        function tampil_agenda(){
            $koneksi = new koneksi();
            $query_agenda = mysqli_query($koneksi->konek(),"SELECT * FROM agenda ORDER BY kode_agenda desc");
            return $query_agenda;
        }
    }
    class admin{
        function login_admin($email,$password){
            $koneksi = new koneksi();
            $query_admin = mysqli_query($koneksi->konek(), "SELECT * FROM adminstrator WHERE email_admin='$email' AND password='$password'");
            $row = mysqli_num_rows($query_admin);
            if($row != 0){
                $arr = mysqli_fetch_array($query_admin);
                $_SESSION['kd_admin'] = $arr['kd_admin'];
                $_SESSION['nim_admin'] = $arr['nim_admin'];
                $_SESSION['alamat_admin'] = $arr['alamat_admin'];
                $_SESSION['jenis_kelamin'] = $arr['jenis_kelamin'];
                $_SESSION['email_admin'] = $arr['email_admin'];
                $_SESSION['password'] = $arr['password'];
                $_SESSION['level'] = $arr['level'];
                $_SESSION['foto_admin'] = $arr['foto_admin'];

                echo "<script>alert('Selamat Datang');
                document.location='index.php'</script>";
            }else{
                echo "<script>alert('Gagal')</script>";
            }
        }
    }
?>