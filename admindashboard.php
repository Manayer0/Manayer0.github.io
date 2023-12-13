<?php
session_start();

require_once ('Models/UserDataSet.php');

if (isset($_SESSION['email'])) {


    
        if ($_SESSION['email'] == 'mohammad.zeinali7717@gmail.com') {
            $UserDataSet = new UserDataSet();
            $user = $UserDataSet->fetchUsers();
            $view = new stdClass();
            $view->pageTitle = 'Blog';
            require_once('Views/admindashboard.phtml');
      }else
      {
          header('location: index.php');
      }
        //require_once ('Views/DeliveryPoints.phtml');
    
}
else
{
    header('location: index.php');
}
?>
