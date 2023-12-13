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
$view->pageTitle = 'Payment Method';
require_once('Views/paymentMethod.phtml');

// Retrieve cart data from local storage


//require_once('Views/template/footer.phtml');
?>
