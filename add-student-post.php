<?php 
    include 'conn.php';
    session_start();

    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $qry=mysqli_query($conn,"select * from petugas where username = '".$_SESSION['username']."'");
    $dt_admin=mysqli_fetch_array($qry);

    $level = 'Siswa';


    $sql = "
    insert into siswa (nisn, nis, nama, id_kelas, alamat, no_tlp, username, password, gender, level)
    values ('" . $nisn . "', '" . $nis . "', '" .$nama . "', '" .$id_kelas . "', '" .$alamat . "', '" .$no_tlp . "', '" .$username . "', '" .md5($password) . "', '" .$gender . "',  '" .$level . "');
    ";

    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "<script>alert('Failed add student');location.href='add-student.php';</script>";
        // printf(mysqli_error($conn));
    }else{
        //ambil data id terakhir
       

        $res = mysqli_query($conn, "select angkatan from siswa join kelas on siswa.id_kelas = kelas.id_kelas where nisn = '".$nisn."'");

  
        $angkatan = mysqli_fetch_array($res);

        $qry_spp= mysqli_query($conn, "select * from spp where angkatan = '".$angkatan['angkatan']."'");
        $dt_spp = mysqli_fetch_array($qry_spp);


        $idspp = $dt_spp['id_spp'];

        
        $awaltempo = '2021-07-01';

        for($i=0; $i<12; $i++){
        
        $jatuhtempo = date("Y-m-d" , strtotime("+$i month" , strtotime($awaltempo)));
 		$bulan     = date("m" ,strtotime($jatuhtempo));
        $tahun = date("Y", strtotime($jatuhtempo));

        $add = mysqli_query($conn,"INSERT INTO pembayaran(nisn , jatuh_tempo, bulan_spp, id_spp, tahun_spp) 
        VALUES ('$nisn','$jatuhtempo','$bulan','$idspp', '$tahun')");
        echo "<script>alert('Success add student');location.href='add-student.php';</script>";
        // printf(mysqli_error($conn));
 

        }
    }
    
  
?>