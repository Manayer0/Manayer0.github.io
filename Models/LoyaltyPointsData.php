<?php

class LoyalityPointsData{
    
    protected  $_loyalityID, $_userID, $_pointsEarned, $_reedemedPoints;

    public function __construct($dbRow) {
        $this->_loyalityID = $dbRow['loyalityID'];
        $this->_userID = $dbRow['userID'];
        $this->_pointsEarned = $dbRow['pointsEarned'];
        $this->_reedemedPoints = $dbRow['reedemedPoints'];
    }
    public function getLoyalityID() {
        return $this->_loyalityID;
    }
   
    public function getUserID() {
       return $this->_userID;
    }
    
    public function PointsEarned() {
       return $this->_pointsEarned;
    }
    public function ReedemedPoints() {
        return $this->_reedemedPoints;
     }
}