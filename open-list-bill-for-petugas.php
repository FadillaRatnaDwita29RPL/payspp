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
        $sql = 'select * from siswa join kelas on siswa.id_kelas=kelas.id_kelas where siswa.id_kelas = '  .$_GET['id_kelas'];
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
                    <h4 class="card-title">Student Data</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Major</th>
                                    <th>Foyer</th>
                                    <th>alamat</th>
                                    <th>no_tlp</th>
                                    <th>gender</th>
                                    <th>username</th>
                                    <!-- <th>password</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while( $data = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?=$data['nisn']?></td>
                                    <td><?=$data['nis']?></td>
                                    <td><?=$data['nama']?></td>
                                    <td><?=$data['nama_kelas']?></td>
                                    <td><?=$data['jurusan']?></td>
                                    <td><?=$data['angkatan']?></td>
                                    <td><?=$data['alamat']?></td>
                                    <td><?=$data['no_tlp']?></td>
                                    <td><?=$data['gender']?></td>
                                    <td><?=$data['username']?></td>
                                    <!-- <td><?=$data['password']?></td> -->
                                    <!-- <td><span class="badge badge-primary px-2">Sale</span> -->
                                    <td>
                                        <a href="bill-tuition-for-petugas.php?nisn=<?php echo $data['nisn']?>"><button class="btn btn-primary px-2">Browse Bill</button></a>
                                    </td>
                                </tr>
                                <?php } ?>
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Major</th>
                                    <th>Foyer</th>
                                    <th>alamat</th>
                                    <th>no_tlp</th>
                                    <th>gender</th>
                                    <th>username</th>
                                    <!-- <th>password</th> -->
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