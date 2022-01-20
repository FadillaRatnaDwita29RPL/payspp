<?php 
    include 'conn.php';

    $nama_kelas = $_POST['nama_kelas'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];

    $sql = "
    insert into kelas (nama_kelas, jurusan, angkatan)
    values ('" . $nama_kelas . "', '" . $jurusan . "', '" .$angkatan . "');
    ";

$result = mysqli_query($conn, $sql);
if($result){
    echo "<script>alert('Success add class');location.href='add-class.php';</script>";
}else{
    echo "<script>alert('Failed add class');location.href='add-class.php';</script>";
}
?>