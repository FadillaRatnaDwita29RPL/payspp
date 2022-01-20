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

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
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
    <div id="main-wrapper">
        <?php 
            include 'navheader.php';
            include 'header-admin.php';
            include 'sidebar_admin.php';
        ?>
         <div class="content-body">

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tuition</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Pay</a></li>
        </ol>
    </div>
</div>
<!-- row -->
    <!-- <div class="container-fluid"> -->
    <div class="container-fluid mt-6">
                <div class="row">
                    <div class="col-lg-12 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h1 class ="card-title text-white">Biodata</h1>
                                <div class="d-inline-block">
                                    <h2 class="text-white"> <?= $data['nama'] ?></h2>
                                </div>
                                <span class="float-right display-3 opacity-5"><i class="fa fa-users"></i></span>
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
                                    <td><?=$data['jurusan']?></td>     
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
                        <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Nominal</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                $sql= mysqli_query($conn ,"select * from pembayaran join spp on pembayaran.id_spp=spp.id_spp WHERE nisn = '$data[nisn]' ORDER BY jatuh_tempo ASC ");
                                // $sql= mysqli_query($conn ," SELECT * FROM pembayaran WHERE nisn = '$data[nisn]' ORDER BY jatuh_tempo ASC ");
                                $i=1;
                                while($sq = mysqli_fetch_assoc($sql)){
                                    echo "
                                       
                                        <tr>
                                            <td>$i</td>
                                            <td>$sq[bulan_spp]</td>
                                            <td>$sq[tahun_spp]</td>
                                            <td>$sq[nominal]</td>
                                            <td>$sq[jatuh_tempo]</td>
                                            <td align='center'";
                                            $keterangan = 'LUNAS';
                                            if ($sq['keterangan'] === $keterangan){
                                                echo "</a>";
                                                echo "<span class='label gradient-8 btn-rounded'>Lunas</span>";
                                            }else {
                                                echo "</a>";
                                                echo "<span class='label gradient-2 btn-rounded'>Belum Lunas</span>";
                                                
                                            }
			                             echo "</td>
                                            <td>$sq[tgl_bayar]</td>
                                            <td align='center'";
                                            
                                            $ket = 'LUNAS';
                                            if ($sq['keterangan'] === $ket){
                                            
                                                echo "</a>";
                                                echo "<a class='btn btn-primary px-2 disabled'style='margin-right:5px'>Bayar<a>";
                                                echo "<a class='btn btn-danger px-2' 
                                                href='cetak_transaksi.php?id_pembayaran=$sq[id_pembayaran]&nisn=$data[nisn]' target='_BLANK'>Cetak</a> ";
                                            }else {
                                              
                                                echo "</a>";
                                                echo "<a class='btn btn-primary px-2' href='transaksi.php?id_pembayaran=$sq[id_pembayaran]&nisn=$data[nisn]'>Bayar</a> ";
                                                
                                            }
			                             echo "</td>
                                                    
                                                
                                        </tr>

                                        ";
                                        $i++;
                                }
                                ?>
                               
                            </tbody>
                            
 
                          
                        </table>
                    </div>

                    
                </div>
            </div>
                </div>
            </div>

    </div>



        <!--**********************************
            Footer start
        ***********************************-->
        <?php 
            include 'footer.php';
        ?>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script src="./plugins/validation/jquery.validate.min.js"></script>
    <script src="./plugins/validation/jquery.validate-init.js"></script>

</body>

</html>