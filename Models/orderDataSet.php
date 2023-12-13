<?php
require_once('Models/Database.php');
require_once ('Models/orderData.php');
class orderDataSet
{
    protected $_dbHandle;
    protected $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    /*
        public function fetchUserByEmail($email) {
            // Prepare and execute a query to fetch user data based on email
            $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
            $stmt = $this->dbConnection->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    }
    */
    public function fetchOrders() {
        $sqlQuery = "SELECT orderID , description , amount , paymentMethod , CONCAT(U.firstName, ' ', U.lastName) AS user_id , orderDate FROM `order` O 
        inner join `users` U ON O.user_id =  U.userID 
        WHERE O.status NOT IN ('C')";
                
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new OrderData($row);
        }
        return $dataSet;
    }

    public function fetchOrderHistory() {
        $sqlQuery = "SELECT orderID , description , amount , paymentMethod , CONCAT(U.firstName, ' ', U.lastName) AS user_id , orderDate FROM `order` O 
        inner join `users` U ON O.user_id =  U.userID 
        WHERE O.status = 'C'";
                
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new OrderData($row);
        }
        return $dataSet;
    }

    public function insertorder($userID, $desc, $quantity, $amount)
    {
        $sqlQuery = 'INSERT INTO order (userID, desc, quantity, amount) VALUES (:value4, :value1, :value2, :value3)';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement

        // Bind parameters
        $statement->bindParam(':value4', $userID);
        $statement->bindParam(':value1', $amount);
        $statement->bindParam(':value2', $quantity);
        $statement->bindParam(':value3', $desc);



        // Execute the PDO statement
        $statement->execute();
    }
   
}