<?php 
    session_start();
    unset($_SESSION['username']);
   
        echo "<script>alert('Succes log out');location.href='index_siswa.php';</script>";
    
?>