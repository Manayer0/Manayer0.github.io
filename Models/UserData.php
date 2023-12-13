<?php

class UserData {
    
    protected  $_userID, $_firstName, $_lastName, $_email , $_password;

    public function __construct($dbRow) {
        $this->_userID = $dbRow['userID'];
        $this->_firstName = $dbRow['firstName'];
        $this->_lastName = $dbRow['lastName'];
        $this->_email = $dbRow['email'];
        $this->_password = $dbRow['password'];
        
    }

    public function getUserID() {
        return $this->_userID;
    }
   
    public function getFirstName() {
       return $this->_firstName;
    }
    public function getLastName() {
      return $this->_lastName;
   }
    
    public function getEmail() {
       return $this->_email;
    }
    public function getPassword() {
        return $this->_password;
     }
  
    
    
}