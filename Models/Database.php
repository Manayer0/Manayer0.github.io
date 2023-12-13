<?php

class Database {
    /**
     * @var Database
     */
    protected static $_dbInstance = null;

    /**
     * @var PDO
     */
    protected $_dbHandle;

    /**
     * @return Database
     */

     public static function getInstance() {
     $host = 'sql12.freesqldatabase.com';
     $username = 'sql12669744';
     $password = 'IXiZVq26yD';
     $database = 'sql12669744';
     
     
     if(self::$_dbInstance === null) { //checks if the PDO exists
        // creates new instance if not, sending in connection info
        self::$_dbInstance = new self($host, $username, $password, $database);
    }

    return self::$_dbInstance;

     }

     /**
     * @param $username
     * @param $password
     * @param $host
     * @param $database
     * 
     */
    private function __construct($host, $username, $password, $database) {
        
            $this->_dbHandle = new PDO("mysql:host=$host;dbname=$database", $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
           
        } 

    /**
     * @return PDO
     */
    public function getdbConnection() {
        return $this->_dbHandle; 
    }

    public function __destruct() {
        $this->_dbHandle = null; 
    }




    }











    
