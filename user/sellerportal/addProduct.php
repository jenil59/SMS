<?php


session_start();

if(!isset($_SESSION['login-username']))
{
    header("Location: ../");
}

$un=$_SESSION['login-username'];
include "./config.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/addBook.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/addproduct.css">



    
</head>
<body>
<div class="main-container">
        <div class="main-wrapper">

            <?php include './header.php' ?>
            <section id="selcat">
                <div class="title">
                    Select category of product
                </div>
                <form name="selectcat">
                    <select name="category" id="" aria-placeholder="select" onchange="loadformbychange()">
                        <option value="" selected>Select  Category</option>
                        <?php
                            $sql="SELECT catid,category_name FROM `category`";
                            $res=mysqli_query($conn,$sql) or die("no category is there!");
                            while($op=mysqli_fetch_assoc($res)){
                         
                        ?>
                          <option value="<?php echo $op["catid"]; ?>"><?php echo $op["category_name"]; ?></option>

                        <?php }
                        
                        ?>
                    </select>
                </form>
            </section>
           
        </div>
    </div>

    <script>

         <?php 

            if(isset($_GET['status']))
            {
                if($_GET['status']==1)
                {
                    $item=$_GET['item'];
                    ?>
                    var item="<?php echo $item; ?>"
                    console.log(item);
                    alert(item + " added succesfully");
                    window.location='./'
                    <?php
                }
                if($_GET['status']==0)
                {
                    ?>
                    alert("Book is not  added succesfully");
                    window.location='./addBook.php'
                    <?php
                }


            }

         ?>

    </script>

    <script src="./js/navbar.js"></script>
    <script src="./js/main.js"></script>

</body>
</html>