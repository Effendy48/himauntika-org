<?php 
    session_start();
    if(!@$_SESSION['kd_admin']){
        include "pages/dashboard/login.php";
    }else{
        include "pages/dashboard/dashboard.php";
    }
?>  