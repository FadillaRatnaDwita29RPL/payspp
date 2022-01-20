<?php 
    include 'conn.php';

    $id_spp = $_GET['id_spp'];

    $sql = "
        delete from spp
        where id_spp = '" . $id_spp. "';
    ";

    $result = mysqli_query($conn, $sql);
    
    if($result){
        echo "<script>alert('Success delete tuition');location.href='edit-tuition.php';</script>";
    }else{
        echo "<script>alert('Failed delete tuition');location.href='edit-tuition.php';</script>";
        // printf('Failed sign up: ' . mysqli_error($conn));
    }
?>