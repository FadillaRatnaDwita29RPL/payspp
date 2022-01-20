<?php 
    include 'conn.php';

    $id_petugas = $_GET['id_petugas'];

    $username = $_POST['username'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];

    $sql = "
        update petugas set username = '" . $username . "', nama_petugas = '" . $nama_petugas . "', level = '" . $level . "', gender = '" . $gender . "', alamat = '" . $alamat . "', no_tlp = '" . $no_tlp . "'
        where id_petugas = '" . $id_petugas . "';
    ";

    $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Success edit officer');location.href='edit-officer.php';</script>";
        }else{
            echo "<script>alert('Failed edit student');location.href='edit-officer.php';</script>";
            // printf('Failed sign up: ' . mysqli_error($conn));
        }
?>