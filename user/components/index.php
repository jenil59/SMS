<?php
session_start();
if(!isset($_SESSION['login-username']))
{
    header("Location: ../");
}

?>