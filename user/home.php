<?php


session_start();
if(!isset($_SESSION['login-username']))
{
    header("Location: ./");
}else{
    $un=$_SESSION['login-username'];
    include './config.php';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include './components/basiclinks.php' ?>
    <link rel="stylesheet" href="./components/assets/css/slider.css">

    
</head>
<body>
<div class="main-container">
        <div class="main-wrapper">

            <?php include './components/header.php' ?>
            <div id="main_page">
                <section id="image-slider">

                    <div id="slider">
                        <figure>
                            <img src="./components/assets/images/img/banner/woman-3190829_1920.jpg" alt="1">
                            <img src="./components/assets/images/img/banner/2.jpg" alt="2">
                            <img src="./components/assets/images/img/banner/3.jpg" alt="3">
                            <img src="./components/assets/images/img/banner/4.png" alt="3">
                        </figure>
                    </div>

                </section>
                <secion id="category">

                    <h1 class="heading">Categories</h1>
                    <div class="container">

                        <a class="box" href="./category.php">
                            <div class="img-box">
                                <img src="./components/assets/images/img/3redbooks.svg" height="90" width="90" alt="">
                            </div>
                            <div class="title">Books</div>

                        </a>
                        <a class="box" href="./category.php">
                            <div class="img-box">
                                <img src="./components/assets/images/img/settings.png" height="90" width="90" alt="">
                            </div>
                            <div class="title">Instruments</div>

                        </a>
                        <a class="box" href="./category.php">
                            <div class="img-box">
                                <img src="./components/assets/images/img/note.png" height="100" width="100" alt="">
                            </div>
                            <div class="title">Notes</div>

                        </a>
                        <a class="box" href="./category.php">
                            <div class="img-box">
                                <img src="./components/assets/images/img/document.png" height="100" width="100" alt="">
                            </div>
                            <div class="title">Papers</div>

                        </a>
                        <a class="box" href="./category.php">
                            <div class="img-box">
                                <img src="./components/assets/images/img/gadget.png" height="100" width="100" alt="">
                            </div>
                            <div class="title">gadjets</div>

                        </a>






                    </div>

                </secion>
                <!-- <section class="collection-box">
                    <div class="collection-heading">
                        <h1>top hottest products</h1>
                        <p class="card-btn">
                            <span> &#139; </span>
                            <span> &#155;  </span>
                        </p>
                    </div>
                    <div class="da">
                        <div class="product">
                            <picture>
                                <img src="./components/assets/images/img/books-img/OIP.jfif" alt="">
                            </picture>
                            <div class="details">
                                <p>
                                    <b>Product One</b><br>
                                    <small>New arrivals</small>
                                </p>
                                <samp>$45.00</samp>

                            </div>
                            <div class="button">
                                <p class="star">
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                </p>
                                <a href="#" class="btn">add-cart</a>
                            </div>
                        </div>
                        <div class="product">
                            <picture>
                                <img src="./components/assets/images/img/books-img/OIP (1).jfif" alt="">
                            </picture>
                            <div class="details">
                                <p>
                                    <b>Product two</b><br>
                                    <small>New arrivals</small>
                                </p>
                                <samp>$45.00</samp>

                            </div>
                            <div class="button">
                                <p class="star">
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                </p>
                                <a href="#" class="btn">add-cart</a>
                            </div>
                        </div>
                        <div class="product">
                            <picture>
                                <img src="./components/assets/images/img/books-img/OIP (3).jfif" alt="">
                            </picture>
                            <div class="details">
                                <p>
                                    <b>Product One</b><br>
                                    <small>New arrivals</small>
                                </p>
                                <samp>$45.00</samp>

                            </div>
                            <div class="button">
                                <p class="star">
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                </p>
                                <a href="#" class="btn">add-cart</a>
                            </div>
                        </div>
                        <div class="product">
                            <picture>
                                <img src="./components/assets/images/img/books-img/OIP (4).jfif" alt="">
                            </picture>
                            <div class="details">
                                <p>
                                    <b>Product One</b><br>
                                    <small>New arrivals</small>
                                </p>
                                <samp>$45.00</samp>

                            </div>
                            <div class="button">
                                <p class="star">
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                </p>
                                <a href="#" class="btn">add-cart</a>
                            </div>
                        </div>
                        <div class="product">
                            <picture>
                                <img src="./components/assets/images/img/books-img/OIP (5).jfif" alt="">
                            </picture>
                            <div class="details">
                                <p>
                                    <b>Product One</b><br>
                                    <small>New arrivals</small>
                                </p>
                                <samp>$45.00</samp>

                            </div>
                            <div class="button">
                                <p class="star">
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                </p>
                                <a href="#" class="btn">add-cart</a>
                            </div>
                        </div>
                        <div class="product">
                            <picture>
                                <img src="./components/assets/images/img/books-img/OIP (6).jfif" alt="">
                            </picture>
                            <div class="details">
                                <p>
                                    <b>Product One</b><br>
                                    <small>New arrivals</small>
                                </p>
                                <samp>$45.00</samp>

                            </div>
                            <div class="button">
                                <p class="star">
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                </p>
                                <a href="#" class="btn">add-cart</a>
                            </div>
                        </div>
                        <div class="product">
                            <picture>
                                <img src="./components/assets/images/img/books-img/OIP (7).jfif" alt="">
                            </picture>
                            <div class="details">
                                <p>
                                    <b>Product One</b><br>
                                    <small>New arrivals</small>
                                </p>
                                <samp>$45.00</samp>

                            </div>
                            <div class="button">
                                <p class="star">
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                </p>
                                <a href="#" class="btn">add-cart</a>
                            </div>
                        </div>
                        <div class="product">
                            <picture>
                                <img src="./components/assets/images/img/books-img/OIP (8).jfif" alt="">
                            </picture>
                            <div class="details">
                                <p>
                                    <b>Product One</b><br>
                                    <small>New arrivals</small>
                                </p>
                                <samp>$45.00</samp>

                            </div>
                            <div class="button">
                                <p class="star">
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                </p>
                                <a href="#" class="btn">add-cart</a>
                            </div>
                        </div>
                        <div class="product">
                            <picture>
                                <img src="./components/assets/images/img/books-img/OIP (9).jfif" alt="">
                            </picture>
                            <div class="details">
                                <p>
                                    <b>Product One</b><br>
                                    <small>New arrivals</small>
                                </p>
                                <samp>$45.00</samp>

                            </div>
                            <div class="button">
                                <p class="star">
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                </p>
                                <a href="#" class="btn">add-cart</a>
                            </div>
                        </div>
                        <div class="product">
                            <picture>
                                <img src="./components/assets/images/img/books-img/OIP (10).jfif" alt="">
                            </picture>
                            <div class="details">
                                <p>
                                    <b>Product One</b><br>
                                    <small>New arrivals</small>
                                </p>
                                <samp>$45.00</samp>

                            </div>
                            <div class="button">
                                <p class="star">
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                </p>
                                <a href="#" class="btn">add-cart</a>
                            </div>
                        </div>
                        <div class="product">
                            <picture>
                                <img src="./components/assets/images/img/books-img/OIP (11).jfif" alt="">
                            </picture>
                            <div class="details">
                                <p>
                                    <b>Product One</b><br>
                                    <small>New arrivals</small>
                                </p>
                                <samp>$45.00</samp>

                            </div>
                            <div class="button">
                                <p class="star">
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                </p>
                                <a href="#" class="btn">add-cart</a>
                            </div>
                        </div>
                        <div class="product">
                            <picture>
                                <img src="./components/assets/images/img/books-img/OIP (12).jfif" alt="">
                            </picture>
                            <div class="details">
                                <p>
                                    <b>Product One</b><br>
                                    <small>New arrivals</small>
                                </p>
                                <samp>$45.00</samp>

                            </div>
                            <div class="button">
                                <p class="star">
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                    <strong> &star;</strong>
                                </p>
                                <a href="#" class="btn">add-cart</a>
                            </div>
                        </div>
                    </div>



                </section> -->
                <section id="collection_products">
                     <?php
                      $r_sql="SELECT id,b_name,author_name,publisher,prize,mrp,img FROM products ORDER BY id DESC limit 15";
                     include './components/slider.php';
                
                ?>
                </section>
               
                <section class="image-text">

                    <div class="text-cover">
                        <h1>
                            section title
                        </h1>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quibusdam et ullam praesentium quae soluta sunt mollitia sed, quaerat architecto voluptatem suscipit nihil? Magni similique quam tempore architecto, est nulla.
                        </p>
                        <a class="btn">
                            view more
                        </a>
                    </div>

                </section>
            </div>
            <?php include './components/footer.php' ?>
           
        </div>
    </div>


    <?php include "./components/basicscripts.php" ?>
</body>
</html>