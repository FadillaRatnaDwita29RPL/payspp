<?php 
    include 'conn.php';

    $nominal = $_POST['nominal'];
    $tahun = $_POST['tahun'];
    $angkatan = $_POST['angkatan'];

    $sql = "
    insert into spp (nominal, tahun, angkatan)
    values ('" . $nominal . "', '" . $tahun . "', '" .$angkatan . "');
    ";

$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('Success add tuition');location.href='add-tuition.php';</script>";
}else{
    echo "<script>alert('Failed add tuition');location.href='add-tuition.php';</script>";
    // printf('Failed sign up: ' . mysqli_error($conn));
}
?>