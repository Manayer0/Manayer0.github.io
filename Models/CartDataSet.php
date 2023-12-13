<?php
require_once('Models/Database.php');
require_once ('Models/Cart.php');
class CartDataSet
{
    protected $dbHandle;
    protected $dbInstance;

    public function __construct()
    {
        $this->dbInstance = Database::getInstance();
        $this->dbHandle = $this->dbInstance->getdbConnection();
    }
}