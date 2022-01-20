<?php 
    include 'conn.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];

    
    $sql = "
    insert into petugas (level, nama_petugas, alamat, no_tlp, username, password, gender)
    values ('" . $level . "', '" .$nama_petugas . "', '" .$alamat . "', '" .$no_tlp . "', '" .$username . "', '" .md5($password) . "', '" .$gender . "');
    ";

    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Success add officer');location.href='add-officer.php';</script>";
    }else{
        echo "<script>alert('Failed add officer');location.href='add-officer.php';</script>";
        // printf('Failed sign up: ' . mysqli_error($conn));
    }
 ?>