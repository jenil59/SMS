<?php
  session_start();
  if(isset($_SESSION['login-username']))
  {
    unset($_SESSION['login-username']);
    
  }
 
      header('Location: ./');
  


?>