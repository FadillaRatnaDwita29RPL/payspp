<?php 
    if($_POST){
        include "conn.php";
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql_petugas=mysqli_query($conn, "select * from petugas where username = '" . $username . "' and password = '" . md5($password) . "'");
        $sql_siswa=mysqli_query($conn, "select * from siswa where username = '" . $username . "' and password = '" . md5($password) . "'");

        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='page-login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='page-login.php';</script>";
        }else{
            if(mysqli_num_rows($sql_petugas)>0){
                $dt_login=mysqli_fetch_assoc($sql_petugas);
                if($dt_login['level'] == "Admin"){
                    session_start();
                    $_SESSION['username']=$dt_login['username'];
                    $_SESSION['password']=$dt_login['password'];
                    $_SESSION['level'] = "Admin";
                    echo "<script>alert('Success login to your admin account');location.href='index_admin.php';</script>";
                }elseif($dt_login['level'] == "Petugas"){
                    session_start();
                    $_SESSION['username']=$dt_login['username'];
                    $_SESSION['password']=$dt_login['password'];
                    $_SESSION['level'] = "Petugas";
                    echo "<script>alert('Success login to your officer account');location.href='index_petugas.php';</script>";
                }
                
            // }elseif(mysqli_num_rows($sql_siswa)>0){
            //     $dt_login=mysqli_fetch_assoc($sql_siswa);
            //     session_start();
            //     $_SESSION['username']=$dt_login['username'];
            //     $_SESSION['password']=$dt_login['password'];
            //     header('Location: index_siswa.php');
            }else{
                echo "<script>alert('Username dan Password tidak benar');location.href='page-login.php';</script>";
            }
        }
    }
?>