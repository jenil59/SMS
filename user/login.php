<?php
session_start();

   if(isset($_POST['submit_login'])){
    include './config.php';
    $uname= mysqli_real_escape_string($conn, $_POST['uname']);
    $pass= mysqli_real_escape_string($conn,md5($_POST['pass']));

    $sql="select username from users where username='{$uname}' && password='{$pass}'";
    //  echo $sql; die();
    $result=mysqli_query($conn,$sql) or die("sql error");
    $vals=mysqli_num_rows($result);

    if($vals>0)
    {
        
        $_SESSION['login-username']=$uname;
        header("Location: ./home.php");
    }
    else
    {
        header("Location:./index.php?status=0");
    }

    

   }



?>