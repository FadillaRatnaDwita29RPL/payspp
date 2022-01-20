<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php 
        include 'conn.php';
        //  if(!isset($_SESSION['username'])){
        //     header('location: page-login.php');
        //     }
        // $qry=mysqli_query($conn,"select * from petugas where username = '".$_SESSION['username']."'");
        // $dt_admin=mysqli_fetch_array($qry);
    ?>
    <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="index_petugas.php" aria-expanded="false">
                            <i class="icon-speedometer menu-icon" style="color:#6c757d"></i><span class="nav-text">Dashboard</span>
                        </a> 
                    </li>
                   
                    <li class="nav-label">Apps</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-money opacity-5"  ></i><span class="nav-text">Tuition</span>
                        </a>
                        <ul aria-expanded="false">
                            <!-- <li><a href="add-tuition.php">Add</a></li> -->
                            <!-- <li><a href="edit-tuition.php">Edit</a></li> -->
                            <li><a href="list-tuition-petugas.php">Pay</a></li>
                            <li><a href="list-bill-petugas.php">Bill</a></li>
                        </ul>
                    </li>
                    
                   
                    <li class="nav-label">Account</li>
                    <li>
                        <a href="logout.php" onclick="return confirm('Are you sure to log out?')">
                            <i class="fas fa-sign-out-alt opacity-5"></i><span class="nav-text">Log Out</span>
                        </a>
                    </li>
                    <!-- <i class="fas fa-sign-out-alt opacity-5"><li class="nav-label">Log Out<a href="logout.php"><</a></li></i> -->
                    
                       
                            
                       
                    
                </ul>
            </div>
        </div>
</body>
</html>
