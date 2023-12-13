<?php
/* 
$view = new stdClass();
$view->pageTitle = 'Placed Order';
require_once('Views/placedOrder.phtml');

require_once('Models/Database.php');
// Retrieve cart data from the form submission
var_dump($cartData);

$cartData = isset($_POST['cartData']) ? json_decode($_POST['cartData'], true) : [];
$db = Database::getInstance();
$pdo = $db->getdbConnection();
// Assuming you have a database connection
// Insert the cart data into the 'order' table
$cartData = isset($_POST['cartData']) ? json_decode($_POST['cartData'], true) : [];

if (is_array($cartData) && !empty($cartData)) {
    foreach ($cartData as $product) {
        $selectedOption = $product['selectedOption'];
        $selectedPrice = array_values(array_filter($product['prices'], function ($price) use ($selectedOption) {
            return $price['option'] === $selectedOption;
        }))[0];
        $amount = $product['quantity'] * $selectedPrice['price'];
    $sql = "INSERT INTO `order` (`description`, `paymentMethod`, `amount`) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);}
    var_dump($stmt);

    $stmt->bindParam(1, $description);
    $stmt->bindParam(2, $selectedMethod);
    $stmt->bindParam(3, $amount);
    try {
        // Execute the SQL query
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage(); // Display any errors for debugging
    }

}
else {
    echo 'Invalid or empty cart data.';
}

//require_once('Views/template/footer.phtml');
*/

session_start(); 
$view = new stdClass();
$view->pageTitle = 'Placed Order';
require_once('Views/placedOrder.phtml');

require_once('Models/Database.php');
$view = new stdClass();
$view->pageTitle = 'Placed Order';
require_once('Views/placedOrder.phtml');
$db = Database::getInstance();
$pdo = $db->getdbConnection();
require_once('Models/Database.php');
// Retrieve cart data from the form submission
// Assuming you have a database connection
// Insert the cart data into the 'order' table
if( isset($_POST['payments']) && isset($_POST['items_text'])  && isset($_POST['subtotal'])  && isset($_SESSION['user_id'])){
    $items_text = $_POST['items_text'];
    $items_text =  str_replace("'"," ",$items_text);
   
    $sql = "INSERT INTO `order` (`description`, `paymentMethod`, `amount`, `user_id`) VALUES 
    ('".$items_text."', '".$_POST["payments"]."', '".$_POST["subtotal"]."', ".$_SESSION['user_id'].")";
   // echo "<br/> sql : ". $sql ;
    $stmt = $pdo->prepare($sql);
    try {
        // Execute the SQL query
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage(); // Display any errors for debugging
    }
}

/*if (is_array($cartData) && !empty($cartData)) {
    foreach ($cartData as $product) {
        $selectedOption = $product['selectedOption'];
        $selectedPrice = array_values(array_filter($product['prices'], function ($price) use ($selectedOption) {
            return $price['option'] === $selectedOption;
        }))[0];
        $amount = $product['quantity'] * $selectedPrice['price'];
    }
    var_dump($stmt);

    $stmt->bindParam(1, $description);
    $stmt->bindParam(2, $selectedMethod);
    $stmt->bindParam(3, $amount);
    try {
        // Execute the SQL query
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage(); // Display any errors for debugging
    }

}*/
else {
    echo 'Invalid or empty cart data.';
}

//require_once('Views/template/footer.phtml');
?>




