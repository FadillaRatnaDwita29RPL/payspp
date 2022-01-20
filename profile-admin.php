<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PaySPP</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <?php 
         
         include 'conn.php';
         session_start();
         $qry=mysqli_query($conn,"select * from petugas where username = '".$_SESSION['username']."'");
         $dt_admin=mysqli_fetch_array($qry);

       
    ?>

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

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <?php 
               
            ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-4">
                                    <img class="mr-3" src="images/avatar/1.png" width="80" height="80" alt="">
                                    <div class="media-body">
                                        <h3 class="mb-0"><?=$dt_admin['nama_petugas']?></h3>
                                        <p class="text-muted mb-0"><?=$dt_admin['level']?></p>
                                    </div>
                                </div>
                                
                                <div class="row mb-5">
                                    <div class="col">
                                        <div class="card card-profile text-center">
                                            <span class="mb-1 text-primary"><i class="fas fa-map-marker-alt"></i></span>
                                            <h3 class="mb-0"><?=$dt_admin['alamat']?></h3>
                                            <p class="text-muted px-4">Address</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card card-profile text-center">
                                            <span class="mb-1 text-warning"><i class="fas fa-venus-mars"></i></span>
                                            <h3 class="mb-0"><?=$dt_admin['gender']?></h3>
                                            <p class="text-muted">Gender</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body">
                            <div class="basic-form">
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ID Petugas</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" value="<?=$dt_admin['id_petugas']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?=$dt_admin['username']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Petugas</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?=$dt_admin['nama_petugas']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Level</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?=$dt_admin['level']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Gender</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?=$dt_admin['gender']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?=$dt_admin['alamat']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?=$dt_admin['no_tlp']?>" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        
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
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
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

</body>

</html>