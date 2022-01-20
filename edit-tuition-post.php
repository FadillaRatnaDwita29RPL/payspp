<?php 
    include 'conn.php';

    $id_spp = $_GET['id_spp'];
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $angkatan = $_POST['angkatan'];

    $sql = "
        update spp set tahun = '" . $tahun . "', angkatan = '" . $angkatan . "', nominal = '" . $nominal . "'
        where id_spp = '" . $id_spp . "';
    ";

    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Success edit tuition');location.href='edit-tuition.php';</script>";
    }else{
        echo "<script>alert('Failed edit tuition');location.href='edit-tuition.php';</script>";
        // printf('Failed sign up: ' . mysqli_error($conn));
    }
?>