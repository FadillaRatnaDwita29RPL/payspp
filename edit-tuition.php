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
        $sql = 'select * from spp';
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tuition</a></li>
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
                    <h4 class="card-title">Tuition Data</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID Tuition</th>
                                    <th>Force</th>
                                    <th>Year</th>
                                    <th>Nominal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while( $data = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?=$data['id_spp']?></td>
                                    <td><?=$data['angkatan']?></td>
                                    <td><?=$data['tahun']?></td>
                                    <td><?=$data['nominal']?></td>
                                    <!-- <td><span class="badge badge-primary px-2">Sale</span> -->
                                    <td>
                                        <a href="edit-tuition-form.php?id_spp=<?php echo $data['id_spp']?>"><button class="btn btn-primary px-2">Edit</button></a>
                                        <a href="delete-tuition-post.php?id_spp=<?php echo $data['id_spp']?>"><button class="btn btn-danger px-2" onclick="return confirm('Are you sure to delete the data ?';?>')">Delete</button></a>
                                    </td>
                                </tr>
                                <?php } ?>
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID Class</th>
                                    <th>Class Name</th>
                                    <th>Major</th>
                                    <th>Force</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
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