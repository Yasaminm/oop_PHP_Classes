<?php

/**
 * Description of Product
 *
 * @author PR06
 */
class Product {
    
    Public $name; //öffentliche Eigenschaft
    private $price = 0;
    
//    public function __construct($name) {
//        $this->name = $name;
//    }
    public function getPrice(){// Öffentliche Methode
        
        return $this->price;
    }
    
    public function setPrice(float $param) { //PHP 7 Feature
//        if (!is_float($param)){
//            return false;
//        }
        $this->price = $param;
    }
    
    public function getSum($amount) {
        $sum = $this->calc($amount, $this->price);
        return $sum;
    }
    private function calc($amount, $price) {
        return $amount * $price;
    }
    
}
