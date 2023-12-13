<?php

require_once('Models/Database.php');
require_once('Models/MenuData.php');
require_once ('Views/menu.js');

class MenuDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function getAllMenu()
    {
        $sql = 'SELECT * FROM menu';
        $statement = $this->_dbHandle->prepare($sql);
        $statement->execute();
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new MenuData($row);
        }
        return $dataSet;
    }

    public function addProduct($photo,$juiceName, $description, $size, $price, $availability)
    {
        $sql = 'INSERT INTO menu (photo,juiceName, description, size, price, availability) VALUES (:juiceName, :description, :size, :price, :availability)';
        $statement = $this->_dbHandle->prepare($sql);
        $statement->bindParam(":photo", $photo);
        $statement->bindParam(":juiceName", $juiceName);
        $statement->bindParam(":description", $description);
        $statement->bindParam(":siez", $size);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":availability", $availability);


            $statement->execute();

    }
}


