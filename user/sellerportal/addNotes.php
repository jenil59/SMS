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
            $extention=array("jpg","jpeg","png","JPG","JPEG","PNG","jfif","pdf");

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
            }
            else
            {
            print_r($errors);
            die();
            }
            

        }
    
    
    
    $nname=mysqli_real_escape_string($conn,$_POST['pname']);
    $auname=mysqli_real_escape_string($conn,$_POST['author']);
    $lng=mysqli_real_escape_string($conn,$_POST['language']);
    $nop=mysqli_real_escape_string($conn,$_POST['nop']);
    $sem=mysqli_real_escape_string($conn,$_POST['sem']);
    $subjectname=mysqli_real_escape_string($conn,$_POST['subname']);
    $branch=mysqli_real_escape_string($conn,$_POST['branch']);
    $clgname=mysqli_real_escape_string($conn,$_POST['unname']);
    $subcode=mysqli_real_escape_string($conn,$_POST['subcode']);
    $kword=mysqli_real_escape_string($conn,$_POST['kword']);
    $desc=mysqli_real_escape_string($conn,$_POST['description']);
    $type=mysqli_real_escape_string($conn,$_POST['type']);
    if($type=='n')
    {
        $type=0; // 0 for notes
        $path_file="../../upload/notes".$new_file_name;
    }
    elseif($type=='p')
    {
        $type=1; // 1 for papers
        $path_file="../../upload/papers".$new_file_name;
    }
    else{
        header("Location: ./addNotes.php?error=tie");
        //error 'tie' is for type invlid error 
    }

    // print_r($_POST) and die();

    $date=date("d/m/y");

    $re=mysqli_query($conn,"SELECT id FROM users where username='{$_SESSION['login-username']}'") or die("Can't not find user !! ");
    $uid=mysqli_fetch_assoc($re)['id'];
        // echo $uid;
    // die();

    
    
    // echo $_FILES["fileToUpload"];

    $sql="INSERT INTO `material` 
    (
        `name`, 
        `author`, 
        `language`, 
        `nop`, 
        `branch`, 
        `clname`, 
        `sem`, 
        `subname`, 
        `subcode`, 
        `image`, 
        `description`,
        `added_date`,
        `type` ) VALUES ('$nname', '$auname', '$lng', $nop, '$branch', '$clgname', $sem, '$subjectname', $subcode, '$new_file_name', '$desc', '$date',$type)
    ";

    //   echo $sql;
    if(empty($errors)==true){
     if(mysqli_query($conn,$sql) or die("query error ! \"try again .\""+mysqli_error($conn  )))
     {
        move_uploaded_file($file_tmp,$path_file);
        header("Location: ./addProduct.php?status=1&item=$type");
     }
    }
    else{
        print_r($errors);
        die();
    }
   


}

?>

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
                    <div class="title"style="line-height:40px">Enter Paper/Notes Details</div>
                    <div class="content">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Paper/Notes Name</span>
                                <input type="text" name="pname" placeholder="Enter Paper/Notes Name" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Author </span>
                                <input type="text" name="author" placeholder="Enter Paper/Notes Author or Writer Name" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Language</span>
                                <input type="text" name="language" placeholder="Language of content" required>
                            </div>
                            
                            <div class="input-box">
                                <span class="details">No Of Pages</span>
                                <input type="text" name="nop" placeholder="Give a Page Count" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Branch</span>
                                <input type="text" name="branch" placeholder="branch" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Collage or University name</span>
                                <input type="text" name="unname" placeholder="Name of collage or University" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Sem</span>
                                <input type="number" name="sem" max="8" placeholder="semester" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Subject name</span>
                                <input type="text" name="subname" placeholder="subject name" required>
                            </div><div class="input-box">

                                <span class="details">Subject code</span>
                                <input type="text" name="subcode" placeholder="subject code" required>
                            </div>
                            
                            <div class="input-box" >
                                <span class="details">Image</span>
                                <input style =" padding: 8px"type="file" name="fileToUpload" accept=".jpg,.jpeg,.png,"  required>
                            </div>
                           
                            <div class="input-box" style="width: 1000px;">
                                <span class="details">Keywords</span>
                                <input type="text" placeholder="Add Keywords" name="kword" required>
                            </div> 
                            <div class="input-box" style="width: 1000px;">
                                <span class="details">Type</span>
                               <select name="type" >
                                   <option>Select Type</option>
                                   <option value="n">Notes</option>
                                   <option value="p">Papers</option>
                               </select>
                            </div>
                            <div class="input-box" style="width: 1000px; margin-bottom: 0;">
                                <span class="details">Description</span>
                                <textarea placeholder="Write About Book" rows="4" name="description" cols="76" required></textarea>
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
          if(isset($_GET['error']))
          {
              $er=$_GET['error'];
              if($er==="tie"){
                ?>alert("Invalid Type of Material ! ")<?php
              }
              else{
                ?>alert(<?php echo $er;?>)<?php
              }
          }
        
        ?>
    </script>
</body>
</html>

    
