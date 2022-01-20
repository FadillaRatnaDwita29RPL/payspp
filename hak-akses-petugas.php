<?php 
    include 'conn.php';
    session_start();
    if(!isset($_SESSION['level'])!= 'Petugas'){
        header('location: page-login.php');
    }
?>