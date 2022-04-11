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
 $sql="SELECT id,b_name,isbn,author_name,quantity,prize,img FROM `products` WHERE userid=$uid";

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
              <div class="title"><h2>Product List</h2></div>
            
            <a href="./addBook.php" class="btn"> + Add New Product</a>
          </div>
          <div class="data_table">
            <table  >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Thumbnail</th>
                        <th>Book_Name</th>
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Quantity</th>
                        <th>Prize</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php  while($data=mysqli_fetch_assoc($result)){ 
                        
                        $img=$data['img'];
                        
                        $path_file="../../upload/".$img;
                    ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td class="thu_img"><img src="<?php echo $path_file; ?>" alt=""></td>
                        <td><?php echo $data['b_name']; ?></td>
                        <td><?php echo $data['isbn']; ?></td>
                        <td><?php echo $data['author_name']; ?></td>
                        <td><?php echo $data['quantity']; ?></td>
                        <td><?php echo $data['prize']; ?></td>
                        <td class="edit"><form action="service_book.php" method="POST"><input type="hidden" name="id" value="<?php echo $data['id'];?>"><button type="submit" name="submit_update" class="btn">Edit</button></form></td>
                        <td class="delete"><form action="service_book.php" method="POST"><input type="hidden" name="id" value="<?php echo $data['id'];?>"><button type="submit" name="submit_delete" class="btn">Delete</button></form></td>
                    </tr>
                            
                    <?php }  ?>

                </tbody>
            </table>
          </div>
      </div>
  </section>


  
    
</body>
</html>