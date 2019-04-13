<?php 
    session_start();
    session_unset();
    echo "<script>alert('Selamat Tinggal');
    document.location='/himauntika-org/admin/index.php'</script>";
?>