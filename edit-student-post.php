<?php 
    include 'conn.php';

    $NISN = $_GET['nisn'];

    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];
    $username = $_POST['username'];
    // $password = $_POST['password'];
    $gender = $_POST['gender'];

    $sql = "
        update siswa set nisn = '" . $nisn . "', nis = '" . $nis . "', nama = '" . $nama . "', id_kelas = '" . $id_kelas . "', alamat = '" . $alamat . "', no_tlp = '" . $no_tlp . "', username = '" . $username . "', gender = '" . $gender . "'
        where nisn = '" . $NISN . "';
    ";

    $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Success edit student');location.href='edit-student.php';</script>";
        }else{
            echo "<script>alert('Failed edit student');location.href='edit-student.php';</script>";
            // printf('Failed sign up: ' . mysqli_error($conn));
        }
?>