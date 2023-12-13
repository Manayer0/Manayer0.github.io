<?php
session_start(); 
//require_once("Views/logIn.phtml");
// Include necessary files and initialize $view->pageTitle
$view = new stdClass();
$view->pageTitle = 'logIn';
require_once('Models/UserDataSet.php');
$loginFlag=0;
//$action= $_GET['action'];



   if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userDataSet = new UserDataSet();
    $userData = $userDataSet->fetchUserByUser($email, $password);
    

    if ($userData) {
      //  print_r($userData);
     
        $_SESSION['email'] = $email;
        $_SESSION["user_id"] = $userData->getUserID();
    //    print_r($_SESSION);
        // Other session variables can be set if needed
       // echo "email set " . $_SESSION['email'];
        $loginFlag = 1;
        // Redirect or include appropriate files for logged-in users
    } else {
        echo '<script>
        alert("Wrong email or password!");
      </script>';

    }
}

if($loginFlag==1) // if user is a valid user
{
   // session_start(); // start user session
    $view->loggerInemail =$email;
   // $_SESSION['usertype'] = $dataSet[0]->getUsertype();

    $_SESSION['email']= $email ;// setting the user in the session.
  /*  if($dataSet[0]->getUsertype()=='M')
        require_once('Views/DMDashboard.phtml');
    if($dataSet[0]->getUsertype()=='D')
        require_once('Views/DUDashboard.phtml');*/
    require_once('Views/index.phtml');
}
else{
    require_once('Views/logIn.phtml');
}
?>