<?php 

 session_start();
 if(!isset($_SESSION['login-username']))
 {
    header('Location: ./');
 }
 else
 {
    $un=$_SESSION['login-username'];
    include './config.php';
 }
 
 if(isset($_GET['prd']))
 {
    $id=$_GET['prd'];
    $sql="SELECT * FROM products where id={$id}";
    // echo $sql;
    // die();
    $result=mysqli_query($conn,$sql) or die("Query error !!");
    
    if(mysqli_num_rows($result)==1)
    {
            $data=mysqli_fetch_assoc($result);
    }
    else
    {
        header("Location: ./home.php");
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>feedback</title>
        <!-- css links -->
        <?php include "../components/basiclinks.php" ?>
        <link rel="stylesheet" href="./components/assets/css/productpage.css">
        <link rel="stylesheet" href="./components/assets/css/slider.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    
    </head>

    <body>
        <div class="main-container">
            <div class="main-wrapper">
            <?php include './components/header.php' ?>

                <section id="ProductPage" style="padding: 30px;">
                    <div class="container">
                        <div id="product_section">
                            <div class="left">
                                <div class="wrapper">
                                    <div class="book_image_box">
                                        <img src="<?php echo "../upload/".$data['img']; ?>" alt="" srcset="">
                                    </div>
                                </div>
                            </div>
                            <div class="center">
                                <div class="wrapper">
                                    <div class="details_sec">
                                        <div class="title">
                                            <h3>
                                               <?php echo $data['b_name']; ?>
                                            </h3>
                                        </div>
                                        <div class="writter_details">
                                            <div class="author">
                                                <strong>Author :</strong>
                                                <h4><?php echo $data['author_name']; ?></h4>
                                            </div>
                                            <div class="saprate">|</div>
                                            <div class="publisher">
                                                <strong>Publisher :</strong>
                                                <h4> <?php echo $data['publisher']; ?></h4>
                                            </div>
                                        </div>
                                        <div class="rating_box">
                                            <div class="star_box">
                                                <p class="star">
                                                    <strong> &starf;</strong>
                                                    <strong> &starf;</strong>
                                                    <strong> &starf;</strong>
                                                    <strong> &star;</strong>
                                                    <strong> &star;</strong>
                                                </p>
                                            </div>
                                            <div class="rating_text">
                                                (5.4)
                                            </div>
                                        </div>
                                        <div class="price_group">
                                            <div class="desc">
                                                <b>Price :</b>
                                            </div>
                                            <div class="price">
                                                &#8377;<?php echo $data['prize']; ?>
                                            </div>
                                            <div class="old_price">
                                                MRP : <span>&#8377;<?php echo $data['mrp']; ?></span>
                                            </div>
                                            <div class="discount">
                                                <span class="cuppon">
                                                <?php
                                                  echo ceil((($data['mrp']-$data['prize'])/$data['mrp'])*100)."% off";
                                                 ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="other_detials">
                                            <div class="availibility">
                                                <b>Stock :</b> <span class="Stock_avail">
                                                    Available
                                                </span>

                                            </div>
                                        </div>
                                        <div class="button_box" style="display: flex;">
                                            <form action="" method="post"><button  class="btn btn_addtocart">
                                                Buy Now
                                            </button></form>
                                            <form action="" method="post"> <button class="btn btn_addtolist">
                                                Add To WishList
                                            </button></form>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="Description_section">
                            <div class="title">
                                <h2>Product Description</h2>
                            </div>
                            <div class="about_product">
                                <div class="title">
                                    <h3>About Book</h3>
                                </div>
                                <div class="description">
                                  <?php echo $data['description']; ?>
                                </div>

                            </div>
                            <div class="product_specification">
                                <div class="title">
                                    <h3>Product Specification</h3>
                                </div>
                                <div class="description">
                                    <div class="data_container">
                                        <table cellpadding="0">

                                            <tr>
                                                <td>Name</td>
                                                <td><?php echo $data['b_name']; ?></td>
                                            </tr>


                                            <tr>
                                                <td>ISBN-13</td>
                                                <td><?php echo $data['isbn']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>ISBN-10</td>
                                                <td><?php echo $data['isbn']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Publisher</td>
                                                <td><?php echo $data['publisher']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Publish Date</td>
                                                <td><?php echo "2/3/2012"; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Language</td>
                                                <td><?php echo $data['language']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Edition</td>
                                                <td>2<sup>nd</sup></td>
                                            </tr>
                                            <tr>
                                                <td>Height</td>
                                                <td>25cm</td>
                                            </tr>
                                            <tr>
                                                <td>width</td>
                                                <td>16cm</td>
                                            </tr>
                                            <tr>
                                                <td>weight</td>
                                                <td>300gm</td>
                                            </tr>

                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div id="Related_product">
                            <?php 

                            $r_sql="SELECT id,b_name,author_name,publisher,prize,mrp,img FROM products ORDER BY id DESC limit 15";

                            include './components/slider.php';
                            ?>
                              
                        </div>
                    </div>
                </section>

            <?php include '../components/footer.php' ?>
            </div>
        </div>


        <!-- scripts -->
        <?php include "../components/basicscripts.php" ?>
    </body>

</html>

<?php

 }
 else
 {
     header("Location: ./home.php");
 }


?>

