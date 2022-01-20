<?php 
    include 'conn.php';
    session_start();
    if(!isset($_SESSION['level'])!= 'Admin'){
        header('location: page-login.php');
    }
?>