<?php

session_start();
if(!isset($_SESSION['login-username']))
{
    header("Location: ../");
}
 $un=$_SESSION['login-username'];
 include './config.php';
 $re=mysqli_query($conn,"SELECT id FROM users where username='{$un}'") or die("Can't not find user !! ");
 $uid=mysqli_fetch_assoc($re)['id'];

    if(isset($_GET['val']))
    {
       $val=$_GET['val'];
       if($val==1)
       {
           $dname="books";
           $sql="SELECT id,b_name,isbn,author_name,quantity,prize,img FROM `books` WHERE uid=$uid";
       }
       elseif($val==2)
       {
           $dname="instruments";
           $sql="SELECT `ins_id`,`ins_name`,`ins_condition`,`ins_price`,`ins_color`,`quanity`,`image`,`added_date` FROM `instruments`  WHERE uid=$uid";
       }
       elseif($val==3)
       {
           $dname="material";
           $sql="SELECT `id`,`name`,`author`,`branch`,`subname`,`image`,`added_date`,`type` FROM `material` WHERE uid=$uid";
       }
    }
    else{
        $dname="books";
        $val=1;
        $sql="SELECT id,b_name,isbn,author_name,quantity,prize,img FROM `books` WHERE uid=$uid";
    }





 
//  $sql="SELECT id,b_name,isbn,author_name,quantity,prize,img FROM `books` WHERE uid=$uid";

 $result=mysqli_query($conn,$sql) or die("query error!!");
 $total_Products=mysqli_num_rows($result);

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/index.css">
    <?php include './basic_link.php'?>
</head>
<body>

  <?php include './header.php' ?>
  <section class="container">
      <div class="card_container">
            <div class="card">
                <div class="text">Total</div>
                <div class="number"><?php echo $total_Products; ?></div>
            </div>
            <div class="card">
                <div class="text">Order</div>
                <div class="number">0</div>
            </div>
            <div class="card">
                <div class="text">Status</div>
                <div class="status">Active</div>
            </div>
      </div>
      <div class="table_list">
          <div class="table_heading">
              <div class="title"><h2>Product List</h2></div><?php /*if(isset($_GET['val'])){echo $_GET['val'];}*/ ?>
              <div class="list">
                  <ul class="catlist">
                      
                      <li class="catlistitem"><a href="./?val=1">Books</a></li>
                      <li class="catlistitem"><a href="./?val=2">Instruments</a></li>
                      <li class="catlistitem"><a href="./?val=3">Notes & Papers</a></li>
                  </ul>
              </div>
            
            <a href="./addProduct.php" class="btn"> + Add New Product </a>
          </div>
          <div class="data_table">
            <table  >
                <?php  ?>
                <thead>
                    <?php  if($val==1){?>
                    <tr>
                        <th>Id</th>
                        <th>Thumbnail</th>
                        <th>Book_Name</th>
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>date</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                    <?php }
                          elseif($val==2)
                          {
                              ?>
                                <tr>
                        <th>Id</th>
                        <th>Thumbnail</th>
                        <th>Instrument Name</th>
                        <th>color</th>
                        <th>condition</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>date</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>


                              <?php
                          }
                          elseif($val==3)
                          {
                              ?>
                                <tr>
                        <th>Id</th>
                        <th>Thumbnail</th>
                        <th>name</th>
                        <th>type</th>
                        <th>author</th>
                        <th>branch</th>
                        <th>subject</th>
                        <th>date</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                              
                              
                              
                              <?php 
                          }

                    ?>
                </thead>
                <tbody>
                   

                    <?php  if($val==1){?>
                        <?php $i=1;  while($data=mysqli_fetch_assoc($result)){ 
                        
                        $img=$data['img'];
                        
                        $path_file="../../upload/".$img;
                    ?>
                    <tr>
                    
                        <td><?php echo $i; ?></td>
                        <td class="thu_img"><img src="<?php echo $path_file; ?>" alt=""></td>
                        <td><?php echo $data['b_name']; ?></td>
                        <td><?php echo $data['isbn']; ?></td>
                        <td><?php echo $data['author_name']; ?></td>
                        <td><?php echo $data['quantity']; ?></td>
                        <td><?php echo $data['prize']; ?></td>
                        <td><?php echo $data['reg_date']; ?></td>
                        <td class="edit"><form action="service_book.php" method="POST"><input type="hidden" name="id" value="<?php echo $data['id'];?>"><button type="submit" name="submit_update" class="btn">Edit</button></form></td>
                        <td class="delete"><form action="service_book.php" method="POST"><input type="hidden" name="id" value="<?php echo $data['id'];?>"><button type="submit" name="submit_delete" class="btn">Delete</button></form></td>
                    </tr>
                            
                    <?php $i++; }  ?>
                    
                    <?php }
                          elseif($val==2)
                          {
                              ?>
                         <?php $i=1;  while($data=mysqli_fetch_assoc($result)){ 
                        
                        $img=$data['image'];
                        
                        $path_file="../../upload/instruments/".$img;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td class="thu_img"><img src="<?php echo $path_file; ?>" alt=""></td>
                        <td><?php echo $data['ins_name']; ?></td>
                        <td><?php echo $data['ins_color']; ?></td>
                        <td><?php echo $data['ins_condition']; ?></td>
                        <td><?php echo $data['quanity']; ?></td>
                        <td><?php echo $data['ins_price']; ?></td>
                        <td><?php echo $data['added_date']; ?></td>
                        <td class="edit"><form action="service_book.php" method="POST"><input type="hidden" name="id" value="<?php echo $data['ins_id'];?>"><button type="submit" name="submit_update" class="btn">Edit</button></form></td>
                        <td class="delete"><form action="service_book.php" method="POST"><input type="hidden" name="id" value="<?php echo $data['ins_id'];?>"><button type="submit" name="submit_delete" class="btn">Delete</button></form></td>
                    </tr>
                            
                    <?php $i++; }  ?>

                              <?php
                          }
                          elseif($val==3)
                          {
                              ?>
                               <?php $i=1;  while($data=mysqli_fetch_assoc($result)){ 
                        
                        $img=$data['image'];

                        if($data["type"]==0)
                        {
                            $path_file="../../upload/notes/".$img;
                        }
                        else{
                            $path_file="../../upload/papers/".$img;
                        }
                        
                      
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td class="thu_img"><img src="<?php echo $path_file; ?>" alt=""></td>
                        <td><?php echo $data['ins_name']; ?></td>
                        <td><?php echo $data['ins_colo']; ?></td>
                        <td><?php echo $data['ins_condition']; ?></td>
                        <td><?php echo $data['quanity']; ?></td>
                        <td><?php echo $data['ins_price']; ?></td>
                        <td><?php echo $data['added_date']; ?></td>
                        <td class="edit"><form action="service_book.php" method="POST"><input type="hidden" name="id" value="<?php echo $data['ins_id'];?>"><button type="submit" name="submit_update" class="btn">Edit</button></form></td>
                        <td class="delete"><form action="service_book.php" method="POST"><input type="hidden" name="id" value="<?php echo $data['ins_id'];?>"><button type="submit" name="submit_delete" class="btn">Delete</button></form></td>
                    </tr>
                            
                    <?php $i++; }  ?>
                              
                              
                              
                              <?php 
                          }

                    ?>

                </tbody>
            </table>
          </div>
      </div>
  </section>


  
    
</body>
</html>