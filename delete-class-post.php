<?php 
    include 'conn.php';

    $id_kelas = $_GET['id_kelas'];

    $sql = "
        delete from kelas
        where id_kelas = '" . $id_kelas. "';
    ";

    $result = mysqli_query($conn, $sql);
    
    if($result) {
        echo "<script>alert('Succes delete this class');location.href='edit-class.php';</script>";
    }else{
        // echo "<script>alert('Failed delete this class');location.href='edit-class.php';</script>";
        printf('Failed delete student: ' . mysqli_error($conn));
        exit();
    }
?>