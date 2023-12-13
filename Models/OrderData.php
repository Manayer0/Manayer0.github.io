<?php

class OrderData {
    
    protected  $_userID, $_orderID, $_amount, $_paymentMethod , $_desc , $_orderDate;

    public function __construct($dbRow) {
        $this->_userID = $dbRow['user_id'];
        $this->_orderID = $dbRow['orderID'];
        $this->_amount = $dbRow['amount'];
        $this->_paymentMethod = $dbRow['paymentMethod'];
        $this->_desc = $dbRow['description'];
        $this->_orderDate= $dbRow['orderDate'];
        
    }

    public function getUserID() {
        return $this->_userID;
    }
   
    public function getOrderID() {
       return $this->_orderID;
    }
    public function getAmount() {
      return $this->_amount;
   }
    
    public function getPaymentMethod() {
       return $this->_paymentMethod;
    }
    public function getDesc() {
        return $this->_desc;
     }
     public function getOrderDate() {
        return $this->_orderDate;
     }
  
    
    
}