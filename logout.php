<?php 
    session_start();
    unset($_SESSION['level']);
   
        echo "<script>alert('Succes log out');location.href='index_admin.php';</script>";
    
?>