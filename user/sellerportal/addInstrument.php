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
                $first=substr($first,0,10);
                $new_file_name=$first.'_'.$new_add.'.'.$sec;
                $path_file="../../upload/instruments/".$new_file_name;

            
            }
            else
            {
            print_r($errors);
            die();
            }
            

        }
    
    
    
    $name=mysqli_real_escape_string($conn,$_POST['Iname']);
    $cname=mysqli_real_escape_string($conn,$_POST['Cname']);
    $mtrl=mysqli_real_escape_string($conn,$_POST['Material']);
    $price=mysqli_real_escape_string($conn,$_POST['price']);
    $mrp=mysqli_real_escape_string($conn,$_POST['mrp']);
    $weight=mysqli_real_escape_string($conn,$_POST['Weight']);
    $condition=mysqli_real_escape_string($conn,$_POST['Condition']);
    $color=mysqli_real_escape_string($conn,$_POST['clr']);
    $quantity=mysqli_real_escape_string($conn,$_POST['qnty']);
    $desc=mysqli_real_escape_string($conn,$_POST['desc']);

    $date=date("d/m/y");

    $re=mysqli_query($conn,"SELECT id FROM users where username='{$_SESSION['login-username']}'") or die("Can't not find user !! ");
    $uid=mysqli_fetch_assoc($re)['id'];
        // echo $uid;
    // die();

    
    
    // echo $_FILES["fileToUpload"];

    $sql="INSERT INTO `instruments` 
    ( 
        `ins_name`, 
        `ins_companyName`, 
        `ins_material`, 
        `ins_weight`, 
        `ins_condition`, 
        `ins_price`, 
        `ins_mrp`, 
        `ins_color`, 
        `quanity`, 
        `image`,
        `description`
        ) 
        VALUES ('$name', '$cname', '$mtrl', $weight, '$condition', $price, $mrp, '$color', $quantity, '$new_file_name','$desc')
    ";

    //   echo $sql;
    if(empty($errors)==true){
     if(mysqli_query($conn,$sql) or die("query error ! \"try again .\""))
     {
        move_uploaded_file($file_tmp,$path_file); 
        header("Location: ./addProduct.php?status=1&item=instrument");
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
                    <div class="title">Enter Instrument Details</div>
                    <div class="content">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Instrument Name</span>
                                <input type="text" name="Iname" placeholder="Enter Instrument Name" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Instrument Compney Name</span>
                                <input type="text" name="Cname" placeholder="Enter Compney Name" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Material</span>
                                <input type="text" name="Material" placeholder="Enter About Product Material " required>
                            </div>
                            <div class="input-box">
                                <span class="details">Weight</span>
                                <input type="number" name="Weight" placeholder="Enter Product Weight" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Condition</span>
                                <input type="text" name="Condition" placeholder="Enter Product Condition" required>
                            </div>
                            <div class="input-box">
                                <span class="details">prize</span>
                                <input type="number" name="price" placeholder="Give Prize" required>
                            </div>
                            <div class="input-box">
                                <span class="details">MRP</span>
                                <input type="number" name="mrp" placeholder="Give Maximum Retail Prize" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Color</span>
                                <input type="text" name="clr" placeholder="Enter Product Color" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Image</span>
                                <input style =" padding: 8px"type="file" name="fileToUpload" accept=".jpg,.jpeg,.png,"  required>
                            </div>
                            <div class="input-box">
                                <span class="details">Quantity</span>
                                <input type="number" name="qnty" placeholder="Enter Product Quantity" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Description</span>
                                <textarea  name="desc" placeholder="Enter Product Quantity" required></textarea>
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

   
</body>
</html>