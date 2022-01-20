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
        $sql = 'select * from petugas';
        $result = mysqli_query($conn, $sql);

        
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Class</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Officer Data</h4>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID Officer</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Telephone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while( $data = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?=$data['id_petugas']?></td>
                                    <td><?=$data['username']?></td>
                                    <td><?=$data['nama_petugas']?></td>
                                    <td><?=$data['level']?></td>
                                    <td><?=$data['gender']?></td>
                                    <td><?=$data['alamat']?></td>
                                    <td><?=$data['no_tlp']?></td>
                                    <!-- <td><span class="badge badge-primary px-2">Sale</span> -->
                                   
                                </tr>
                                <?php } ?>
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID Officer</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Telephone Number</th>
                                </tr>
                            </tfoot>
                        </table>
                        <a href="cetak-petugas.php" target="_BLANK"><button class="btn btn-primary px-2">Cetak</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
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