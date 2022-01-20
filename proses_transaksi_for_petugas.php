<?php 
    include 'conn.php';
    session_start();

    $id_spp = $_GET['id_pembayaran'];
    $nisn = $_GET['nisn'];

    $qry=mysqli_query($conn,"select * from petugas where username = '".$_SESSION['username']."'");
    $dt_admin=mysqli_fetch_array($qry);

    $id_petugas = $dt_admin['id_petugas'];

    // $today = date("ymd");


    $tgl_bayar = $_POST['tgl_bayar'];

    $bayar = mysqli_query($conn ,"UPDATE pembayaran SET 
            tgl_bayar = '$tgl_bayar',
            keterangan = 'LUNAS',
            id_petugas = '$id_petugas' 
            WHERE id_pembayaran = '$id_spp'");

    if($bayar){
        header('location: browse-student-for-petugas.php?nisn='.$nisn);
    }else{
        echo "
			<script>
			alert('gagal')
			</script>
			";
    }
?>