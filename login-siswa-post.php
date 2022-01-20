<?php 
    if($_POST){
        include "conn.php";
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql_siswa=mysqli_query($conn, "select * from siswa where username = '" . $username . "' and password = '" . md5($password) . "'");

        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='page-login-siswa.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='page-login-siswa.php';</script>";
        }else{
            if(mysqli_num_rows($sql_siswa)>0){
                $dt_login=mysqli_fetch_assoc($sql_siswa);
                session_start();
                $_SESSION['username']=$dt_login['username'];
                $_SESSION['password']=$dt_login['password'];
                $_SESSION['level']="Siswa";
                echo "<script>alert('Success login to your student account');location.href='index_siswa.php';</script>";
            }else{
                echo "<script>alert('Username dan Password tidak benar');location.href='page-login-siswa.php';</script>";
            }
        }
    }
?>