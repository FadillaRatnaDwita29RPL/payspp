<?php 
    include 'conn.php';

    $id_kelas = $_GET['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];

    $sql = "
        update kelas set nama_kelas = '" . $nama_kelas . "', jurusan = '" . $jurusan . "', angkatan = '" . $angkatan . "'
        where id_kelas = '" . $id_kelas . "';
    ";

    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Succes edit this class');location.href='edit-class.php';</script>";
    }else{
        echo "<script>alert('Failed edit this class');location.href='edit-class.php';</script>";
    }
?>