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
        
        $qry=mysqli_query($conn,"select * from petugas where username = '".$_SESSION['username']."'");
        $dt_admin=mysqli_fetch_array($qry);

       
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
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Class</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="edit-student-post.php?nisn=<?php echo $_GET['nisn']?>" method="post">
                                        <?php 
                                            $sql = 'select * from siswa where nisn = ' .$_GET['nisn'] ;
                                            $result = mysqli_query($conn, $sql);
                                            $data = mysqli_fetch_assoc($result);
                                        ?>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">NISN<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="nisn" placeholder="Enter NISN.." value="<?= $data['nisn']?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">NIS<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-email" name="nis" placeholder="Enter NIS.." value="<?= $data['nis']?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Name <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-password" name="nama" placeholder="Enter the name..." value="<?= $data['nama']?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Class <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                            <select name="id_kelas" class="form-control">
                                                <option></option>
                                                <?php
                                                    include "conn.php";
                                                    $qry_kelas=mysqli_query($conn,"select * from kelas");
                                                    while($data_kelas=mysqli_fetch_array($qry_kelas)){
                                                        if($data_kelas['id_kelas']==$data['id_kelas']){
                                                            $selek="selected";
                                                        } else {
                                                            $selek="";
                                                        }
                                                        echo '<option value="'.$data_kelas['id_kelas'].'" '.$selek.'>'.$data_kelas['nama_kelas'].'</option>';   
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Address <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea name="alamat" class="form-control" placeholder="Enter the address.."><?=$data['alamat']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Telephone Number<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-password" name="no_tlp" placeholder="Enter phone number.." value="<?=$data['no_tlp']?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Gender <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                            <?php $arr_gender=array('L'=>'Laki-laki','P'=>'Perempuan');?>
                                            <select name="gender" class="form-control">
                                            <option></option>
                                                <?php foreach ($arr_gender as $key_gender => $val_gender):
                                                    if($key_gender==$data['gender']){
                                                        $selek="selected";
                                                    } else {
                                                        $selek="";
                                                    }
                                                ?>
                                                <option value="<?=$key_gender?>" <?=$selek?>><?=$val_gender?></option>
                                                <?php endforeach ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Username<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-password" name="username" placeholder="Enter username..." value="<?=$data['username']?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Password<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password"  class="form-control" id="val-password" name="password" placeholder="Enter the name..." value="<?= $data['password']?>" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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