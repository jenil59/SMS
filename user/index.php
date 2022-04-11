<?php

session_start();
if(isset($_SESSION['login-username']))
{
   
    header("Location: ./home.php");
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
			<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Login with Twitter</a>
		</span>
            </div>
        </div>


        <div class="right">
            <h5>Login</h5>
            
            <form action="./login.php" method="post">
                <div class="inputs">
                    <input type="text" placeholder="user name" name="uname" required/>
                    <br>
                    <input type="password" placeholder="password" name="pass" required/>
                </div>  

                <br><br>

                <div >
                    
                    <a href="#">forget password?</a>
                </div>

                <br>
                <button type="submit" name="submit_login">Login</button>
            </form>
            <p>Don't have an account? <a href="./registration.php">Creat Your Account</a> it takes less than a minute</p>
        </div>

    </div>
    <!-- partial -->

</body>

</html>