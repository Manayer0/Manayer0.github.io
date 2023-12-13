<HTML>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<meta http-equiv="refresh" content="10" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="src/jquery-2.1.4.min.js"></script>




<?php
require_once("Views/admindashboard.phtml");
require_once('Models/orderDataSet.php');

$view = new stdClass();
$view->pageTitle = 'users page';


$orderDataSet = new orderDataSet();
$orders = $orderDataSet->fetchOrders();

if ($orders != null) {
    
    echo '<body><div style="margin-left: 20%;width: 75%" >';
    echo "<h2>Orders</h2>";
    echo '<table class="table table-hover">';
    echo "<tr><th>Order ID</th><th>Order Date</th><th>Cutomer</th><th>Total Amount</th><th>Payment Method</th><th>Desc</th><th></th></tr>";

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
        echo '<td><input type="submit" class="button" value="Send To History" onclick="orderHistory('.$orderID.');" > </td>';
        echo "</tr>";
    }

   

} else {
    echo "No orders found.";
}
?>

<script type="text/javascript">
    function orderHistory($orderId) { 
        
        location.replace("Models/updateOrder.php?orderId="+$orderId);
       
    } 
    
    
</script>
</table></div></body></html>