<?php  
session_start(); 
//print_r($_SESSION);
if(isset($_SESSION['t'])){
    echo "4 ";
    

 }
$view = new stdClass();
$view->pageTitle = 'Homepage';
require_once('Views/index.phtml');






?>