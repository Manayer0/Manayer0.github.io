<?php
$view = new stdClass();
$view->pageTitle = 'INSERT';
require_once('Models/UserDataSet.php');
require_once('Views/signUp.phtml');



    if (isset($_POST['submit'])) {

        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $UserDataSet = new UserDataSet();

        $UserDataSet->insertUsers($firstName, $lastName, $email, $password);
    }


    // if (isset($_POST['submit'])) {
    //     try {
   
    //   $userDataSet->insertUsers($_POST['firstName'], $_POST['lastName'],isset($_POST['email']), isset($_POST['password']));

    //     echo "Your account has been registered successfully!";
    // } catch (PDOException $e) {
    //     echo "Error: " . $e->getMessage();  
    // }

    // }
?>