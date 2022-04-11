<?php


session_start();
if(!isset($_SESSION['login-username']))
{
     if(isset($_POST['submit_res']))
     {
         include './config.php';
         $fn= mysqli_real_escape_string($conn,$_POST['firstname']);
         $mn=mysqli_real_escape_string($conn,$_POST['middlename']);
         $ln=mysqli_real_escape_string($conn,$_POST['lastname']);
         $email=mysqli_real_escape_string($conn,$_POST['email']);
         $mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
         $gender=mysqli_real_escape_string($conn,$_POST['gender']);
         $username=mysqli_real_escape_string($conn,$_POST['uname']);
         $password=mysqli_real_escape_string($conn,md5($_POST['password']));

         $sql="INSERT INTO `users` (`fn`, `mn`, `ln`, `email`, `MobileNo`, `username`, `password`) VALUES ('{$fn}', '{$mn}', '{$ln}', '{$email}', {$mobile}, '{$username}', '{$password}')";

          
         $result=mysqli_query($conn,$sql) or die("Sql query error !!");
         
          if($result)
          {
              header("Location: ./registration.php?dadresult=1");
          }

     }
   
}
else
{
    header("Location: ./product.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="./components//assets/css/login.css">
    <link rel="stylesheet" href="./components//assets/css/registration.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="box-form">
        <div class="left">
            <div class="overlay">
                <h1>Study Material Store</h1>
                <p></p>
                <span>
			<p>login with social media</p>
			<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		</span>
            </div>
        </div>


        <div id="res_right">
        <h1>Registaration</h1>
        <form action="" method="post">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <label for="fname">First Name:</label>
            </div>
            <div class="col-90">
                <input type="text" id="fname" name="firstname" placeholder="Enter your first name" required>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <label for="lname">Middle Name:</label>
            </div>
            <div class="col-90">
                <input type="text" id="mname" name="middlename" placeholder="Enter Your Middle name" required>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <label for="lname">Last Name:</label>
            </div>
            <div class="col-90">
                <input type="text" id="lname" name="lastname" placeholder="Enter your last name" required>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <label for="email">Email:</label>
            </div>
            <div class="col-90">
                <input type="email" id="email" name="email" placeholder="abc@gmail.com" required>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <label for="mobile">Mobile:</label>
            </div>
            <div class="col-90">
                <input type="tel" id="mobile" name="mobile" placeholder="only 10 digits are allowed" required>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <label for="gender" required>Gender:</label>
            </div>
            <div class="col-90">
                <input type="radio" id="male" name="gender" value="male" required /> <label for="male">Male</label> 
                <input type="radio" id="female" name="gender" value="female" /><label for="female">Female</label> 
            </div>
        </div>

        <div class="row">
            <div class="col-10">
                <label for="uname">Username:</label>
            </div>
            <div class="col-90">
                <input type="text" id="uname" name="uname" maxlength="10" required>
            </div>
        </div>

        <div class="row">
            <div class="col-10">
                <label for="password">Password:</label>
            </div>
            <div class="col-90">
                <input type="password" id="password" name="password" maxlength="8" required>
            </div>
        </div>

        <div class="row" style="margin-top:20px;">
            <input class="ctrl" type="submit" name="submit_res" value="Submit" onclick="">
            <input class="ctrl" type="submit" value="Cancel" onclick="window.location='./'">
        </div>

        <a class="ret_page" href="./">
            return to <span >login</span>
        </a>

    </div>
</form>
        </div>

    </div>
    <!-- partial -->

    <?php 
        if(isset($_GET['dadresult']))
        {
            if($_GET['dadresult']==1)
            {
                ?>
                <script>
                    alert("User is succesfully Registrated .");
                    window.location='./';
                </script>

                <?php

            }
        }  
    ?>
    

</body>

</html>