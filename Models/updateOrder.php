<?php
     $host = 'sql12.freesqldatabase.com';
     $username = 'sql12669744';
     $password = 'IXiZVq26yD';
     $database = 'sql12669744';
     $conn = new mysqli($host, $username, $password, $database);
     $conn->set_charset('utf8mb4');
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
    require_once ('orderData.php');
    if(isset($_GET['orderId'])){
        $order_id = $_GET['orderId'];
        $sqlQuery = "update `order` set status = 'C' where orderID=".$order_id;
       /* $this->dbInstance = Database::getInstance();
        $this->dbHandle = $this->dbInstance->getdbConnection();
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
     
        $statement->bindParam(1, $pointsEarned);
        $statement->bindParam(2, $redeemedPoints);

        try {
            $result = $statement->execute();
        } // execute the PDO statement
        catch (PDOException $e) {
            echo "Errors:" . $e->getMessage();
        }*/
        if ($conn->query($sqlQuery) === TRUE) {
            echo "order Updated";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        header("Location: ../orders.php");
        exit();
    }
 
?>