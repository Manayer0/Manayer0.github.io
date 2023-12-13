<?php
require_once('Models/Database.php');
require_once ('Models/LoyaltyPointsData.php');
class LoyaltyPointsDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchLoyaltyPoints()
    {
        $sqlQuery = 'SELECT * FROM loyalityPoints';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        try {
            $statement->execute(); // execute the PDO statement
        } // execute the PDO statement}
        catch (PDOException $e) {
            echo "Errors:" . $e->getMessage();
        }
        $dataSet = [];

        while ($row = $statement->fetch()) {
            $dataSet[] = new LoyalityPointsData($row);
        }
        //  var_dump( $dataSet );
        return $dataSet;
    }
    public function insertPoints( $pointsEarned, $redeemedpoints)
    {
        $sqlQuery = 'INSERT INTO loyalityPoints (userID,pointsEarned,redeemedpoints) VALUES (?, ?)';


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->bindParam(1, $pointsEarned);
        $statement->bindParam(2, $redeemedpoints);


        try {
            $result = $statement->execute();
        } // execute the PDO statement
        catch (PDOException $e) {
            echo "Errors:" . $e->getMessage();
        }
        // Check if the insert was successful
        if ($result) {
            // Return a success message or true
            return true;
        } else {
            // Return an error message or false
            return false;
        }
    }

    public function updatePoints($userID,$pointsEarned,$redeemedPoints)
    {
        $sqlQuery = 'update loyalityPoints set pointsEarned=?,redeemedPoints=?where id=?';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
     
        $statement->bindParam(1, $pointsEarned);
        $statement->bindParam(2, $redeemedPoints);

        try {
            $result = $statement->execute();
        } // execute the PDO statement
        catch (PDOException $e) {
            echo "Errors:" . $e->getMessage();
        }
        // Check if the update was successful
        if ($result) {
            // Return a success message or true
            return true;
        } else {
            // Return an error message or false
            return false;
        }

    }
    public function deletePointsEarned($pointsEarned)
    {
        $sqlQuery = 'delete FROM loyalityPoints where pointsEarned=?';
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->bindParam(1, $pointsEarned);
        try {
            $result = $statement->execute();
        } // execute the PDO statement
        catch (PDOException $e) {
            echo "Errors:" . $e->getMessage();
        }
        // Check if delete was successful
        if ($result) {
            // Return a success message or true
            return true;
        } else {
            // Return an error message or false
            return false;
        }
    }
    public function addPoints($userId, $pointsEarned)
    {
        $sqlQuery = 'UPDATE loyalityPoints SET pointsEarned = pointsEarned + ? WHERE userID = ?';
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->bindParam(1, $userId);
        $statement->bindParam(2, $pointsEarned);
        try {
            $statement->execute([$pointsEarned, $userId]);
            return true; // Success message or true
        } catch (PDOException $e) {
            echo "Errors:" . $e->getMessage();
            return false; // Error message or false
        }
    }
    public function redeemPoints($userId, $pointsEarned)
    {
        $sqlQuery = 'UPDATE loyalityPoints SET pointsEarned = pointsEarned - ?, redeemedPoints = redeemedPoints + ? WHERE userID = ? AND pointsEarned >= ?';
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->bindParam(1, $userId);
        $statement->bindParam(2, $pointsEarned);
        try {
            $statement->execute([ $pointsEarned, $userId, $pointsEarned]);
            $rowCount = $statement->rowCount(); // Check affected rows
            if ($rowCount > 0) {
                return true; // Points deducted and marked as redeemed successfully
            } else {
                return false; // Insufficient points or user not found
            }
        } catch (PDOException $e) {
            echo "Errors:" . $e->getMessage();
            return false; // Error message or false
        }
    }
}