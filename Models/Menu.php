<?php
class Menu {

protected $_photo, $_juiceID, $_juiceName, $_description,$_size ,$_price, $_availability;

public function __construct($dbRow) {
    $this->_photo = $dbRow['photo'];
$this->_juiceID = $dbRow['juiceID'];
$this->_juiceName = $dbRow['juiceName'];
$this->_description = $dbRow['description'];
$this->_size = $dbRow['size'];
$this->_price = $dbRow['price'];
$this->_availability = $dbRow['availability'];
}

public function getPhoto(){
    return $this->_photo;
}
public function getJuiceID() {
return $this->_juiceID;
}

public function getJuiceName() {
return $this->_juiceName;
}

public function getDescription() {
return $this->_description;
}

    public function getSize() {
        return $this->_size;
    }
    public function getPrice() {
        return $this->_price;
    }


public function getAvailability() {
return $this->_availability;
}

}


