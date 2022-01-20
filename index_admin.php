<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PaySPP</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <!-- <?php 
        include 'conn.php';
        // include 'hak-akses-admin.php';
        session_start();
        
        if(!isset($_SESSION['username'])){
            header('location: page-login.php');
            
        }

        if($_SESSION['level']!= 'Admin'){
            header('location: page-login.php');
        }

        
        
        
        $qry=mysqli_query($conn,"select * from petugas where username = '".$_SESSION['username']."'");
        $dt_admin=mysqli_fetch_array($qry);
        $day = date('Y-m-d');
    ?> -->
    
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
            <div class="container-fluid mt-6" style="margin-bottom: -30px;">
                <div class="row">
                    <div class="col-lg-12 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h1 class ="card-title text-white">Selamat datang di Website PaySPP !!</h1>
                                <div class="d-inline-block">
                                    <h2 class="text-white"> <?= $dt_admin['nama_petugas'] ?></h2>
                                    <p class="text-white mb-2"><?=$dt_admin['level']?></p>
                                </div>
                                <span class="float-right display-3 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php 
            
            $date = date('Y-m-d');
            $ket = 'LUNAS';
            $sql= mysqli_query($conn ,"select * from pembayaran join spp on pembayaran.id_spp=spp.id_spp and jatuh_tempo < '$date' and tgl_bayar IS NULL ORDER BY jatuh_tempo ASC ");
            // $sql= mysqli_query($conn ,"select * from pembayaran join spp on pembayaran.id_spp=spp.id_spp where jatuh_tempo < '$date' and keterangan IS NULL ORDER BY jatuh_tempo ASC ");
            // $sql= mysqli_query($conn ," SELECT * FROM pembayaran WHERE nisn = '$data[nisn]' ORDER BY jatuh_tempo ASC ");
            $i=1;
            $total=0;
            while($sq = mysqli_fetch_assoc($sql)){
                    $i++;
                    $total += $sq['nominal'];
            }

            $sql2= mysqli_query($conn ,"select * from pembayaran join spp on pembayaran.id_spp=spp.id_spp where keterangan='$ket' ORDER BY jatuh_tempo ASC ");
            $a=0;
            $income=0;
            while($sq2 = mysqli_fetch_assoc($sql2)){
                $a++;
                $income += $sq2['nominal'];
            }
            
            ?>
        

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Income</h3>
                                <div class="d-inline-block">
                                <h2 class="text-white" style="font-size: 25px;">Rp <?=$income?>,-</h2>
                                    <p class="text-white mb-0"><?=$date?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Arrears</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white" style="font-size: 25px;">Rp <?=$total?>,-</h2>
                                    <p class="text-white mb-0"><?=$date?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    
                </div>

                
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        <?php 
            include 'footer.php';
        ?>
        
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

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>