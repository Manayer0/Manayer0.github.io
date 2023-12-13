<?php

// models/CartModel.php

class Cart {
    

    private $cartItems = [];

    public function getCartItems() {
        return $this->cartItems;
    }

    public function addToCart($product) {
        $this->cartItems[] = $product;
    }
}
?>