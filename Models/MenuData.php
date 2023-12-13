<?php

class MenuData {

    protected $photo;
    protected $juiceID;
    protected $juiceName;
    protected $description;
    protected $size ;
    protected $price;
    protected $availability;

    /**
     * @param $photo;
     * @param $juiceID;
     * @param $juiceName;
     * @param $description;
     * @param $size;
     * @param $price;
     * @param $availability;
     */


    public function __construct($row) {
        $this->photo=$row['photo'];
        $this->juiceID = $row['juiceID'];
        $this->juiceName = $row['juiceName'];
        $this->description = $row['description'];
        $this->size = $row['size'];
        $this->price = $row['price'];
        $this->availability = $row['availability'];
    }

    /**
     * @return mixed
     */


    public function getPhoto(){
        return $this->photo;
    }
    public function getJuiceID() {
        return $this->juiceID;
    }

    public function getJuiceName() {
        return $this->juiceName;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }


    public function getSize() {
        return $this->size;
    }

    public function getAvailability() {
        return $this->availability;
    }

}







