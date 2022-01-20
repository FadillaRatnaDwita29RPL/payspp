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
        $sql = 'select * from kelas';
        $result = mysqli_query($conn, $sql);

        
    ?>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <?php 
            include 'navheader.php';
            include 'header-petugas.php';
            include 'sidebar_petugas.php';
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

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                
                    <div class="input-group icons">
                            <form action="search-bill-petugas.php" method="get">
                                <table class="table">
                                <td>
                                    <input type="text" class="form-control" placeholder="Search Student By NISN" name="nisn">
                                </td>
                                <td>
                                <button type="submit" class="btn btn-primary px-2">Search</button>
                                </td>
                          
                                </table>

                            </form>
                       
                    </div>
           
                    <br>
                    <h4 class="card-title">Class Data</h4>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID Class</th>
                                    <th>Class Name</th>
                                    <th>Major</th>
                                    <th>Force</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while( $data = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?=$data['id_kelas']?></td>
                                    <td><?=$data['nama_kelas']?></td>
                                    <td><?=$data['jurusan']?></td>
                                    <td><?=$data['angkatan']?></td>
                                    <td><a href="open-list-bill-for-petugas.php?id_kelas=<?php echo $data['id_kelas']?>""><button class="btn btn-primary px-2" >Open</button></a></td>
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