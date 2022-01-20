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



    <?php 
        include 'conn.php';
        session_start();
        $sql = 'select * from  kelas';
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
                                <h1 class ="card-title text-white">LAPORAN DATA KELAS SMK TELKOM MALANG</h1>
                                <span class="float-right display-3 opacity-5"><i class="fas fa-school"></i></span>
                            </div>
                        </div>
                    </div>
                    
                    

            

                    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Class Data</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID Class</th>
                                    <th>Class Name</th>
                                    <th>Major</th>
                                    <th>Force</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while( $data = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?=$data['id_kelas']?></td>
                                    <td><?=$data['nama_kelas']?></td>
                                    <td><?=$data['jurusan']?></td>
                                    <td><?=$data['angkatan']?></td>
                                </tr>
                                <?php } ?>
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID Class</th>
                                    <th>Class Name</th>
                                    <th>Major</th>
                                    <th>Force</th>

                                </tr>
                            </tfoot>
                        </table>

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