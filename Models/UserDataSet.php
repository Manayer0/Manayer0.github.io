<?php
require_once('Models/Database.php');
require_once ('Models/UserData.php');
class UserDataSet
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
    public function fetchUsers()
    {
        if ($this->_dbHandle === null) {
            echo "Error: Database connection is null.";
            return [];
        }

        $sqlQuery = 'SELECT * FROM users';

        $statement = $this->_dbHandle->prepare($sqlQuery);

        try {
            $statement->execute();

            $dataSet = [];
            while ($row = $statement->fetch()) {
                $dataSet[] = new UserData($row);
            }

            return $dataSet;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }



    /*
    public function fetchUserByUser($email,$password) {
        $sqlQuery = 'SELECT * FROM users where email=? and password=?';
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->bindParam(1, $email);
        $statement->bindParam(2, $password);
        
        try {
            $statement->execute();

            $dataSet = [];
            while ($row = $statement->fetch()) {
                $dataSet[] = new UserData($row);
            }

            return $dataSet;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    } 
    */

    public function insertUsers($firstName, $lastName, $email, $password)
    {
        if ($this->isEmailExists($email)) {
            // Email already exists, show an alert
            echo "<script>alert('Error: Email address already exists. Please choose a different email.');</script>";
        } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sqlQuery = 'INSERT INTO users (firstName, lastName, email, password ) VALUES (:value1, :value2, :value3, :value4)';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement

        // Bind parameters
        $statement->bindParam(':value1', $firstName);
        $statement->bindParam(':value2', $lastName);
        $statement->bindParam(':value3', $email);
        $statement->bindParam(':value4', $hashedPassword);


        // Execute the PDO statement
        $statement->execute();}
    }

    private function isEmailExists($email)
    {
        // Check if the email already exists in the database
        // ... (your database query code here)

        // Example using PDO
        $stmt = $this->_dbHandle->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
         $stmt->execute([$email]);
         $count = $stmt->fetchColumn();

        // Uncomment the above lines and replace them with your actual database query code

        // Example return (modify based on your database logic)
        // return $count > 0;

        // For the sake of the example, always return true (simulating an existing email)
        return true;
    }

    public function fetchUserByUser($email, $password)
    {
        $sqlQuery = 'SELECT * FROM users WHERE email = ? LIMIT 1';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(1, $email);
    
        try {
            $statement->execute();
    
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                // Verify the entered password against the hashed password stored in the database
                if (password_verify($password, $row['password'])) {
                    return new UserData($row);
                }
            }
    
            // If no user found or password doesn't match, return null
            return null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
    public function fetchUserInfoByUser($email)
    {
        $sqlQuery = 'SELECT * FROM users WHERE email = ? LIMIT 1';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(1, $email);
    
        try {
            $statement->execute();
    
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                // Verify the entered password against the hashed password stored in the database
                //if (password_verify($password, $row['password'])) {
                    return new UserData($row);
                //}
            }
    
            // If no user found or password doesn't match, return null
            return null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function trackFailedLoginAttempts($email)
    {
        $sqlQuery = 'SELECT attempts FROM failed_login_attempts WHERE email = ?';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->bindParam(1, $email);

        try {
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $attempts = $row['attempts'] + 1;

                if ($attempts >= 5) {
                    // If  exceed the limit, ban the email
                    // Perform your ban action (e.g., deactivate the account or set a 'banned' flag in your users table)
                    // Example: UPDATE users SET banned = 1 WHERE email = ?
                    echo "Your account has been banned due to multiple failed login attempts.";
                } else {
                    // Update attempts count
                    $updateQuery = 'UPDATE failed_login_attempts SET attempts = ? WHERE email = ?';
                    $updateStatement = $this->_dbHandle->prepare($updateQuery);
                    $updateStatement->bindParam(1, $attempts);
                    $updateStatement->bindParam(2, $email);
                    $updateStatement->execute();
                }
            } else {
                // Insert the email with 1 attempt
                $insertQuery = 'INSERT INTO failed_login_attempts (email, attempts) VALUES (?, 1)';
                $insertStatement = $this->_dbHandle->prepare($insertQuery);
                $insertStatement->bindParam(1, $email);
                $insertStatement->execute();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
    
    
}