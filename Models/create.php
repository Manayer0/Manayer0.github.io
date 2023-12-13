<?php
require_once('Models/Database.php');
require_once('Models/MenuData.php');
require_once('Models/MenuDataSet.php');
require_once ('Views/menu.js');

if (isset($_POST['submit'])) {
    $photo=$_POST['photo'];
    $juiceName = $_POST['juiceName'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];

    $menuDataSet = new MenuDataSet();
    $menuDataSet->addProduct($photo,$juiceName, $description, $size, $price, $availability);


    header('Location: menu.php ');

}

require_once('Views/create.phtml');
 