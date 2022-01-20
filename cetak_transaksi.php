<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pay SPP</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .print{
			margin-top: 10px;
            width: 95%;
		}
		@media print{
			.print{
				display: none;
			}
		}
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->

    <?php 
        include 'conn.php';
        session_start();
        $sql = 'select * from  siswa  join kelas on siswa.id_kelas=kelas.id_kelas where nisn =' .$_GET['nisn'];
        $result = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($result);
    ?>
    <!--**********************************
        Main wrapper start
    ***********************************-->
   

<!-- row -->
    
    <div class="container" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-lg-12 col-sm-12" style="margin-bottom: 20px;">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h1 class ="card-title text-white">LAPORAN PEMBAYARAN SPP SMK TELKOM MALANG</h1>
                                <div class="d-inline-block">
                                    <h2 class="text-white"> <?= $data['nama'] ?></h2>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="card-title">Student Data</h4> -->
                   
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-hover table-striped  header-border zero-configuration">
                        
                                <tr class="table table-primary px-2">
                                    <th>NISN</th>
                                    <td><?=$data['nisn']?></td>     
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td><?=$data['nama']?></td>     
                                </tr>
                                <tr class="table table-primary px-2">
                                    <th>Class</th>
                                    <td><?=$data['nama_kelas']?></td>     
                                </tr>
                                <tr>
                                    <th>Major</th>
                                    <td><?=$data['jurusan']?></td>     
                                </tr>
                                <tr class="table table-primary px-2">
                                    <th>Foyer</th>
                                    <td><?=$data['angkatan']?></td>     
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?=$data['alamat']?></td>     
                                </tr>
                                <tr class="table table-primary px-2">
                                    <th>Telephone Number</th>
                                    <td><?=$data['no_tlp']?></td>     
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td><?=$data['gender']?></td>     
                                </tr>
                                <tr class="table table-primary px-2">
                                    <th>Username</th>
                                    <td><?=$data['username']?></td>     
                                </tr>
 
                          
                        </table>
                    </div>

                    
                </div>
            </div>
                </div>

         <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="card-title">Student Data</h4> -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                        <h4 class="card-title">Tuition Payment Data</h4>
                            
                        
                            
                            <?php 
                            $id_pembayaran = $_GET['id_pembayaran'];
                            $spp= mysqli_query($conn ,"select * from petugas join pembayaran on petugas.id_petugas=pembayaran.id_petugas join spp on pembayaran.id_spp=spp.id_spp WHERE nisn = '$data[nisn]' and keterangan = 'LUNAS' and id_pembayaran = '$id_pembayaran' ORDER BY jatuh_tempo ASC ");
                                // $spp = $conn --> query("select * from pembayaran join spp on pembayaran.id_spp=spp.id_spp where id_pembayaran = '$_GET[id_pembayaran]'");
                                $data_spp=mysqli_fetch_array($spp);
                            ?>
                                <tr class="table table-primary px-2">
                                    <th>Nominal</th>
                                    <td><?=$data_spp['nisn']?></td>     
                                </tr>
                                <tr>
                                    <th>Tahun SPP</th>
                                    <td><?=$data_spp['tahun_spp']?></td>     
                                </tr>
                                <tr class="table table-primary px-2">
                                    <th>Bulan SPP</th>
                                    <td><?=$data_spp['bulan_spp']?></td>     
                                </tr>
                                <tr>
                                    <th>Tanggal Jatuh Tempo</th>
                                    <td><?=$data_spp['jatuh_tempo']?></td>     
                                </tr>
                                <tr class="table table-primary px-2">
                                    <th>Keterangan</th>
                                    <td>
                                        <?php 
                                        $ket = 'LUNAS';
                                        if ($data_spp['keterangan'] === $ket){
                                            echo "</a>";
                                            echo "<span class='label gradient-8 btn-rounded'>Lunas</span>";
                                        }else {
                                            echo "</a>";
                                            echo "<span class='label gradient-2 btn-rounded'>Belum Lunas</span>";
                                            
                                        }
                                        ?>
                                    </td>     
                                </tr>
                                <tr>
                                    <th>Tanggal Pembayaran</th>
                                    <td><?=$data_spp['tgl_bayar']?></td>
                                </tr>
                                <tr class="table table-primary px-2">
                                    <th>Nama Petugas</th>
                                    <td><?=$data_spp['nama_petugas']?></td>
                                </tr>

                             <!-- <tr>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Nominal</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Pembayaran</th>
                            </tr> -->
                          
                            
 
                          
                        </table>
                    </div>

                    
                </div>
            </div>
                </div>
            </div>

    </div>

    <!-- <a href="#" onclick="window.print();"><button class="btn btn-primary px-2" style="margin-left: 600px; margin-bottom: 20px;">Cetak</button></a> -->

    <script>
        window.print();
    </script>
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script src="./plugins/validation/jquery.validate.min.js"></script>
    <script src="./plugins/validation/jquery.validate-init.js"></script>

</body>

</html>