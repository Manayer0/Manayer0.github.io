<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
  if (isset($_SESSION["email"]) && $_SESSION['user_id']){
   
  }else{
    //print_r($_GET); echo $_SESSION['user_id'];
    header("Location: index.php");
    exit();
  }

$view = new stdClass();
$view->pageTitle = 'profile';
require_once('Views/profile.phtml');