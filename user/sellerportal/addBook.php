<?php


session_start();

if(!isset($_SESSION['login-username']))
{
    header("Location: ../");
}

$un=$_SESSION['login-username'];

if(isset($_POST['submit'])){
    include './config.php';
    $file_name="";
    
    
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
            $extention=array("jpg","jpeg","png","JPG"."JPEG","PNG","jfif");

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

    $date=date("d/m/y");

    $re=mysqli_query($conn,"SELECT id FROM users where username='{$_SESSION['login-username']}'") or die("Can't not find user !! ");
    $uid=mysqli_fetch_assoc($re)['id'];
        // echo $uid;
    // die();

    
    
    // echo $_FILES["fileToUpload"];

    $sql="INSERT INTO `products` (`b_name`, `author_name`, `publisher`, `language`, `prize`, `mrp`, `isbn`, `nofpages`, `quantity`, `description`, `img`,`reg_date`,`userid`) 
          VALUES 
          (
              '{$bname}',
              '{$auname}', 
              '{$publisher}', 
              '{$lng}', 
              '{$prize}', 
              '{$mrp}', 
              '{$isbn}', 
              '{$nop}', 
              '{$qut}', 
              '{$desc}',
              '{$new_file_name}',
              '{$date}',
              {$uid}

          )";

    //   echo $sql;
    if(empty($errors)==true){
     if(mysqli_query($conn,$sql) or die("query error ! \"try again .\""))
     {
        
        move_uploaded_file($file_tmp,$path_file);
            
        header("Location: ./addBook.php?status=1");
     }
    }
    else{
        print_r($errors);
        die();
    }
   


}

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


    
</head>
<body>
<div class="main-container">
        <div class="main-wrapper">

            <?php include './header.php' ?>
            <section id="addform">
                <div class="container">
                    <div class="title">Enter Book Details</div>
                    <div class="content">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Book Title & Edition</span>
                                <input type="text" name="bname" placeholder="Title And Edition Numbers" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Author And Contributors</span>
                                <input type="text" name="auname" placeholder="Add Author and contributors" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Language</span>
                                <input type="text" name="language" placeholder="Language of content" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Publisher</span>
                                <input type="text" name="publisher" placeholder="Give Book Publisher Name" required>
                            </div>
                            <div class="input-box">
                                <span class="details">prize</span>
                                <input type="number" name="prize" placeholder="Give Prize" required>
                            </div>
                            <div class="input-box">
                                <span class="details">MRP</span>
                                <input type="number" name="mrp" placeholder="Give Maximum Retail Prize" required>
                            </div>
                            <div class="input-box">
                                <span class="details">ISBN</span>
                                <input type="number" name="isbn" placeholder="ISBN number" required>
                            </div>
                            <div class="input-box">
                                <span class="details">No Of Pages</span>
                                <input type="text" name="nop" placeholder="Give a Page Count" required>
                            </div>
                            <div class="input-box" style="width: 300px;">
                                <span class="details">Image</span>
                                <input style =" padding: 8px"type="file" name="fileToUpload" accept=".jpg,.jpeg,.png,"  required>
                            </div>
                            <div class="input-box">
                                <span class="details">Quantity</span>
                                <input type="number" name="qut" placeholder="Give Book Count" required>
                            </div>
                            <div class="input-box" style="width: 1000px;">
                                <span class="details">Keywords</span>
                                <input type="text" placeholder="Add Keywords" name="kword" required>
                            </div>
                            <div class="input-box" style="width: 1000px; margin-bottom: 0;">
                                <span class="details">Description</span>
                                <textarea placeholder="Write About Book." rows="4" name="description" cols="76" required></textarea>
                            </div>
                        </div>                   
                        <div class="button">
                            <input type="submit" name="submit" value="SUBMIT">
                        </div>
                    </form>
                    </div>
                </div>
            </section>
           
        </div>
    </div>

    <script>

         <?php 

            if(isset($_GET['status']))
            {
                if($_GET['status']==1)
                {
                    ?>
                    alert("Book added succesfully");
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

</body>
</html>