<?php
require_once("Views/admindashboard.phtml");
require_once('Models/orderDataSet.php');

$view = new stdClass();
$view->pageTitle = 'users page';


$orderDataSet = new orderDataSet();
$orders = $orderDataSet->fetchOrderHistory();

if ($orders != null) {
    echo '<html><head> <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> </head>';
    echo '<body><div style="margin-left: 20%;width: 75%" >';
    echo "<h2>Order History</h2>";
    echo '<table class="table table-hover">';
    echo "<tr><th>Order ID</th><th>Order Date</th><th>Cutomer</th><th>Total Amount</th><th>Payment Method</th><th>Desc</th></tr>";

    foreach ($orders as $value) {
       
        $orderID = $value->getOrderID();
        $userID= $value->getUserID();
        $amount = $value->getAmount();
        $paymentMethod = $value->getPaymentMethod();
        $description = $value->getDesc();
        $orderDate = $value->getOrderDate();

        echo "<tr>";
        echo "<td>" . $orderID. "</td>";
        echo "<td>" . $orderDate. "</td>";
        echo "<td>" . $userID . "</td>";
        echo "<td>" . $amount. "</td>";
        echo "<td>" . $paymentMethod . "</td>";
        echo "<td>" . $description . "</td>";
        echo "</tr>";
    }

    echo "</table></div></body></html>";

} else {
    echo "No orders found.";
}

