<?php 
    include 'conn.php';

    $nisn = $_GET['nisn'];

    $sql = "
        delete from siswa
        where nisn = '" . $nisn. "';
    ";

    $result = mysqli_query($conn, $sql);
    
    if($result){
        echo "<script>alert('Success delete officer');location.href='edit-student.php';</script>";
    }else{
        echo "<script>alert('Failed delete student');location.href='edit-student.php';</script>";
        // printf('Failed sign up: ' . mysqli_error($conn));
    }
?>