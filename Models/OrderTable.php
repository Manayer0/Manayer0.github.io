<?php

class Payment {
    
    protected  $_userID, $_orderDate, $_price ;

    public function __construct($dbRow) {
        $this->_userID = $dbRow['userID'];
        $this->_orderDate = $dbRow['orderDate'];
        $this->_price = $dbRow['price'];
    }
    public function getUserID() {
        return $this->_userID;
    }
   
    public function getOrderDate() {
       return $this->_orderDate;
    }
    
    public function getPrice() {
       return $this->_price;
    }
}