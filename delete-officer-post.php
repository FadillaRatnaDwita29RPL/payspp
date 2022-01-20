<?php 
    include 'conn.php';

    $id_petugas = $_GET['id_petugas'];

    $sql = "
        delete from petugas
        where id_petugas = '" . $id_petugas. "';
    ";

    $result = mysqli_query($conn, $sql);
    
    if($result){
        echo "<script>alert('Success delete officer');location.href='edit-student.php';</script>";
    }else{
        echo "<script>alert('Failed delete officer');location.href='edit-student.php';</script>";
        // printf('Failed sign up: ' . mysqli_error($conn));
    }
?>