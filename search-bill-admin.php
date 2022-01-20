<?php 
    session_start();
    include 'conn.php';

    $nisn = $_GET['nisn'];
    $data = $conn->query("SELECT * FROM siswa WHERE nisn = '$nisn'");
	$dta = mysqli_fetch_assoc($data);
    if($dta){
    header('location: bill-tuition-for-admin.php?nisn='.$nisn);
    }else{
        echo "<script>alert('Data siswa tidak ditemukan');location.href='list-tuition.php';</script>";
    }
?>