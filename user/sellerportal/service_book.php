<?php
session_start();
if(!isset($_SESSION['login-username']))
{
    header("Location: ../");
}
else{$un=$_SESSION['login-username'];}

if(isset($_POST['submit_final']) or isset($_POST['submit_update']) or isset($_POST['submit_delete']))
{
  // header("Location: ./");


  include './config.php';
  ?>
  <?php



  if(isset($_POST['id'])){$id=$_POST['id'];}

  if(isset($_POST['submit_final'])){
      
      $file_name="";
      if(empty( $_FILES['fileToUpload']['name']))
      {
          $file_name=$_POST['old_img'];
          $st=0;
      }
      else{
        if(isset($_FILES["fileToUpload"]))
        {
              $errors=array();
            $st=1;
            $file_name = $_FILES['fileToUpload']['name'];
            $file_size = $_FILES['fileToUpload']['size'];
            $file_tmp  = $_FILES['fileToUpload']['tmp_name'];
            $file_type = $_FILES['fileToUpload']['type'];
            $cut_file=explode('.',$file_name);
            $file_ext=end($cut_file);
            $extention=array("jpg","jpeg","png","JPG"."JPEG","PNG");

            // echo $file_name." --- ".$file_size." --- ".$file_tmp." --- ".$file_type." --- ".$file_ext;

            if(in_array($file_ext,$extention)===false)
            {
            $errors[]="this file is not allow here ! please insert jpg ,png,jpeg file";
            }
            if(strpos($file_name,'_')!=false)
            {
            $errors[]="this file name is not allow here ! please rename your filename (filename has not contain '_' character)";
            }


            if($file_size>2097152)
            {
            $errors[]="the size of file is big (it must be < 2 Mb)";
            }

            if(empty($errors)==true)
            {
                
                $first=explode(".",$file_name)['0'];
                $sec=explode(".",$file_name)['1'];
                $new_add=str_split(sha1($un),5)[0];
                $new_file_name=$first.'_'.$new_add.'.'.$sec;
                $path_file="../../upload/".$new_file_name;

              
            }
            else
            {
            print_r($errors);
            die();
            }
            

        }
      }
      
    
      
      $bname=mysqli_real_escape_string($conn,$_POST['bname']);
      $auname=mysqli_real_escape_string($conn,$_POST['auname']);
      $lng=mysqli_real_escape_string($conn,$_POST['language']);
      $publisher=mysqli_real_escape_string($conn,$_POST['publisher']);
      $prize=mysqli_real_escape_string($conn,$_POST['prize']);
      $mrp=mysqli_real_escape_string($conn,$_POST['mrp']);
      $isbn=mysqli_real_escape_string($conn,$_POST['isbn']);
      $nop=mysqli_real_escape_string($conn,$_POST['nop']);
      $qut=mysqli_real_escape_string($conn,$_POST['qut']);
      $kword=mysqli_real_escape_string($conn,$_POST['kword']);
      $desc=mysqli_real_escape_string($conn,$_POST['description']);

        
      $sql_up="UPDATE `products` SET 
      `b_name`='{$bname}',
      `author_name`='{$auname}',
      `publisher`='{$publisher}',
      `language`='{$lng}',
      `prize`={$prize},
      `mrp`={$mrp},
      `isbn`={$isbn},
      `nofpages`={$nop},
      `quantity`={$qut},
      `description`='{$desc}',
      `img`='{$new_file_name}' 
      
      WHERE id={$id}";

      //   echo $sql;
      if(empty($errors)==true){
      if(mysqli_query($conn,$sql_up) or die("query error ! \"try again .\""))
      {
          if($st==1){ move_uploaded_file($file_tmp,$path_file);}
          header("Location: ./?status=1");
      }
      }
      else{
          print_r($errors);
          die();
      }
    
    }

  ?>


  <?php
    if(isset($_POST['submit_update'])){
      $sql="SELECT `b_name`, `author_name`, `publisher`, `language`, `prize`, `mrp`, `isbn`, `nofpages`, `quantity`, `description`, `img` FROM `products` where id={$id}"; 
        if($result=mysqli_query($conn,$sql) or die("query error ! try again !"))
        {
          $or_data=mysqli_fetch_assoc($result);
          // print_r($or_data);
        ?>
          <!DOCTYPE html>
          <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Home</title>
                <!-- <?php include './components/basiclinks.php' ?> -->
                <link rel="stylesheet" href="./css/addBook.css">
                <!-- <link rel="stylesheet" href="./css/index.css"> -->
                <link rel="stylesheet" href="./css/index.css">


                
            </head>
            <body>
              <div class="main-container">
                    <div class="main-wrapper">

                        <?php include './header.php' ?>
                        <section id="addform">
                            <div class="container">
                                <div class="title">Update Book Details</div>
                                <div class="content">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post">
                                    <div class="user-details">
                                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="input-box">
                                            <span class="details">Book Title & Edition</span>
                                            <input type="text" name="bname" value="<?php echo $or_data['b_name'];?>" placeholder="Title And Edition Numbers" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Author And Contributors</span>
                                            <input type="text" name="auname" value="<?php echo $or_data['author_name'];?>" placeholder="Add Author and contributors" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Language</span>
                                            <input type="text" name="language" value="<?php echo $or_data['language'];?>" placeholder="Language of content" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Publisher</span>
                                            <input type="text" name="publisher" value="<?php echo $or_data['publisher'];?>"  placeholder="Give Book Publisher Name" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">prize</span>
                                            <input type="number" name="prize" value="<?php echo $or_data['prize'];?>" placeholder="Give Prize" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">MRP</span>
                                            <input type="number" name="mrp" value="<?php echo $or_data['mrp'];?>" placeholder="Give Maximum Retail Prize" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">ISBN</span>
                                            <input type="number" name="isbn" value="<?php echo $or_data['isbn'];?>" placeholder="ISBN number" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">No Of Pages</span>
                                            <input type="text" name="nop" value="<?php echo $or_data['nofpages'];?>" placeholder="Give a Page Count" required>
                                        </div>
                                        <div class="input-box" style="width: 300px;">
                                            <span class="details">Image</span>
                                            <input style =" padding: 8px"type="file" name="fileToUpload" accept=".jpg,.jpeg,.png,"  >
                                            <input style =" padding: 8px"type="hidden" value="<?php echo $or_data['img']; ?>" name="old_img" accept=".jpg,.jpeg,.png,"  >
                                            <figure style="margin: 40px;">
                                            <?php
                                            
                                            $path_file="../../upload/".$$or_data['img'];
                                            
                                            ?>
                                            <img src="<?php echo $path_file;?>" style="width: 132px;" alt="">
                                            <figcaption>-current picture</figcaption>
                                            </figure>
                                          </div>
                                        <div class="input-box">
                                            <span class="details">Quantity</span>
                                            <input type="number" name="qut" value="<?php echo $or_data['quantity'];?>" placeholder="Give Book Count" required>
                                        </div>
                                        <div class="input-box" style="width: 1000px;">
                                            <span class="details">Keywords</span>
                                            <input type="text" placeholder="Add Keywords" value="" name="kword" >
                                        </div>
                                        <div class="input-box" style="width: 1000px; margin-bottom: 0;">
                                            <span class="details">Description</span>
                                            <textarea placeholder="Write About Book." rows="4" value="" name="description" cols="76" required><?php echo $or_data['description'];?></textarea>
                                        </div>
                                    </div>                   
                                    <div class="button">
                                        <input type="submit" name="submit_final" value="SUBMIT">
                                    </div>
                                </form>
                                </div>
                            </div>
                        </section>
                      
                      
                    </div>
              </div>

                

                <script src="./js/navbar.js"></script>

            </body>
          </html>     
        <?php
        }
          /* UPDATE `products` SET `id`='[value-1]',`b_name`='[value-2]',`author_name`='[value-3]',`publisher`='[value-4]',`language`='[value-5]',`prize`='[value-6]',`mrp`='[value-7]',`isbn`='[value-8]',`nofpages`='[value-9]',`quantity`='[value-10]',`description`='[value-11]',`img`='[value-12]' WHERE 1 */   
    }
  ?>


  <?php

    if(isset($_POST['submit_delete'])){

      $sql_del="DELETE FROM `products` WHERE id={$id}";
      if(mysqli_query($conn,$sql_del) or dir("Query error ! deletion failed ! try again !"))
      {
        header("Location: ./service_book.php?cat='del'&val=1");
      }

    }



} 
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
    </head>
    <body>
     <?php echo $_GET['cat']; ?>
      <script>
         <?php 

if(isset($_GET['status']))
{
    if($_GET['status']==1)
    {
        ?>
        alert("Book updated succesfully");
        window.location='./'
        <?php
    }
    if($_GET['status']==0)
    {
        ?>
        alert("Book is not updated succesfully");
        window.location='./addBook.php'
        <?php
    }


}else{
  header("Location: ./");
}

?>
      </script>

<!-- <script>
      //  <?php  
      //       if(isset($_GET['cat']) && isset($_GET['val']))
      //       {
      //           if($_GET['cat']=="upd")
      //           {
      //               if($_GET['val']==1){
      //   ?>
      //                alert("Data Updated succesfully.");
      //   <?php
      //               }
      //               else{
      //   ?>              alert("Data is not updated.");
      //   <?php
      //               }
      //           }
      //           if($_GET['cat']=="del")
      //           {
      //               if($_GET['val']==1){
      //               ?>
      //                alert("Data Deleted succesfully.");
      //               <?php
      //               }
      //               else{
      //                   ?>alert("Data is not deleted.");<?php
      //               }
      //           }
      //       }       
      //  ?>
</script> -->
    </body>
    </html>