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
        // $id_kelas = $_GET['id_kelas'];
        // $sql = 'select * from siswa join kelas on siswa.id_kelas=kelas.id_kelas where siswa.id_kelas = '  .$_GET['id_kelas'];
        // $result = mysqli_query($conn, $sql);
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
                                <h1 class ="card-title text-white">LAPORAN DATA PEMBAYARAN SPP SISWA SMK TELKOM MALANG</h1>
                                <span class="float-right display-3 opacity-5"><i class="fas fa-school"></i></span>
                            </div>
                        </div>
                    </div>
                    
                    

            

                    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Payment Data</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Major</th>
                                    <th>Foyer</th>
                                    <th>Tahun SPP</th>
                                    <th>Bulan SPP</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $spp = $conn -> query("SELECT * from kelas join siswa on kelas.id_kelas = siswa.id_kelas join pembayaran on siswa.nisn = pembayaran.nisn join spp on pembayaran.id_spp = spp.id_spp WHERE tgl_bayar BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]' and keterangan = 'LUNAS'");
                                $i=1;
                                $total = 0;
                                while($data=mysqli_fetch_array($spp)) :
                            ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$data['nisn']?></td>
                                    <td><?=$data['nis']?></td>
                                    <td><?=$data['nama']?></td>
                                    <td><?=$data['nama_kelas']?></td>
                                    <td><?=$data['jurusan']?></td>
                                    <td><?=$data['angkatan']?></td>
                                    <td><?=$data['tahun_spp']?></td>
                                    <td><?=$data['bulan_spp']?></td>
                                    <td><?=$data['jatuh_tempo']?></td>
                                    <td><?=$data['tgl_bayar']?></td>
                                    <td><?=$data['nominal']?></td>
                                </tr>
                                <?php $i++; ?>
                                <?php $total += $data['nominal']; ?>

                                <?php endwhile; ?>
                                <tr>
                                    <td colspan="11" align="right">TOTAL</td>
                                    <td align="right"><b><?= $total ?></b></td>
                                    <td></td>
                                </tr>
                               
                            </tbody>
                        </table>
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