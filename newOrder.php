<?php

$view = new stdClass();
$view->pageTitle = 'INSERT';
require_once('Models/orderDataSet.php');
require_once('Views/menu.phtml');

if (isset($_POST['submit'])) {
    try {


       $orderDataSet = new orderDataSet();
       $email = $_SESSION['email'];
        $sql = "SELECT userID FROM users WHERE email='$email'";
                $orderDataSet->insertorder($email, $_POST['lastname'],isset($_POST['Inter']) ? 1 : 0, $_POST['course']);

        echo "Record inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
