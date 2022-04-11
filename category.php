<?php

use function PHPSTORM_META\elementType;

    
    include './user/config.php';




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include './components/basiclinks.php' ?>
    <link rel="stylesheet" href="./components/assets/css/category.css">

    
</head>
<body>
<div class="main-container">
        <div class="main-wrapper">

            <?php include './components/header.php' ?>
            <section id="main_category">
                <div class="title">
                <?php if(isset($_GET['search-query'])){ echo "Searched results for '{$_GET['search-query']}'";} ?>

                </div>
                <div class="containt">
                    <div id="side_bar">
                        <div class="side_menu">
                            <div  class="filter_head"><h3> FILTER</h3></div>
                            <div  class="filter1"><span>PRIME & DELIVERY</span><i class="fa fa-angle-down"></i></div>
                            <div  class="filter1"><span>CATEGORIES</span><i class="fa fa-angle-down"></i></div>
                            <div  class="filter1"><span>BRANDS</span><i class="fa fa-angle-down"></i></div> 
                        </div>    
                    </div>
                    <div class="product_list">


                        <!-- product-1 -->
                        <?php

                           if(isset($_GET['search-query']))
                           {
                               $sq=mysqli_real_escape_string($conn,$_GET['search-query']);

                               $sql="SELECT id,b_name,author_name,publisher,prize,mrp,img FROM products where b_name like '%{$sq}%'";
                           }
                           else{
                               if(empty($_SERVER['QUERY_STRING'])==1){
                                $sql="SELECT id,b_name,author_name,publisher,prize,mrp,img FROM products ";
                               }
                               else{
                                   header("Location: ./");
                               }
                           }

                           
                            $result=mysqli_query($conn,$sql) or die("Query error !");
                            if(mysqli_num_rows($result)>=1)
                            {

                                while($data=mysqli_fetch_assoc($result)){

                                    ?>
                                         <div  class="card">
                                            <div class="img_book">
                                                <a href="./product.php?prd=<?php echo $data['id']; ?>" class="image">
                                                    <?php $file_img='./upload/'.$data['img']; ?>
                                                    <img src="<?php echo $file_img; ?>" alt="   image">
                                                </a>
                                            </div>
                                            <div class="data_book"> 
                                                <a href="./product.php?prd=<?php echo $data['id']; ?>" class="book_title"><?php echo substr($data['b_name'],0,50)."..."; ?></a>
                                                <div class="book_auname"><?php echo substr($data['author_name'],0,20)."..."; ?></div>
                                                <div class="book_publication"><?php echo substr($data['publisher'],0,20)."..."; ?></div>
                                                <div class="offer_lab">
                                                    <div class="offer_text">
                                                    <?php
                                                  echo ceil((($data['mrp']-$data['prize'])/$data['mrp'])*100)."% off";
                                                 ?>
                                                    </div>
                                                </div>
                                                <div class="prizebox">
                                                    <div class="orignal"> &#x20B9; <?php echo $data['prize']; ?></div>
                                                    <div class="mrp">&#x20B9;<?php echo $data['mrp']; ?></div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    
                                    <?php

                                }
                                    
                            }
                            else
                            {
                               echo "No Records Found . "; 
                            }

                        ?>

                       
                        
                    </div>
                </div>
            </section>
            <?php include './components/footer.php' ?>
           
        </div>
    </div>


    <?php include "./components/basicscripts.php" ?>
</body>
</html>