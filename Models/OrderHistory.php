<?php

class OrderHistory {
    
    protected  $_orderID, $_userID, $_juiceID, $_orderDate, $_status ;

    public function __construct($dbRow) {
        $this->_orderID = $dbRow['orderID'];
        $this->_userID = $dbRow['userID'];
        $this->_juiceID = $dbRow['juiceID'];
        $this->_orderDate = $dbRow['orderDate'];
        $this->_status = $dbRow['status'];
    }
    public function getOrderID() {
        return $this->_orderID;
    }
   
    public function getUserID() {
       return $this->_userID;
    }
    
    public function JuiceID() {
       return $this->_juiceID;
    }
    public function OrderDate() {
        return $this->_orderDate;
     }
     public function Status() {
        return $this->_status;
     }
}