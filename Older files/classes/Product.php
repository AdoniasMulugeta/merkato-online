<?php
class Product{
    private $product_id;
    private $product_name;
    private $catagory;
    private $description;
    private $image_dir;
    private $email;
    private $on_sale;
    private $on_sale_price;
    private $status;
    private $quantity;
    private $weight;
    private $seller_id;
  

    function __construct($product_name='',$price='',$image='') {
        $this->product_name = $product_name;
        $this->price = $price;
        $this->image_dir = $image;
    }
   

    function getProductName(){
         return $this->product_name;
     }
    function getProductid(){
         return $this->product_id;
     }
    function getCatagory(){
         return $this->catagory;
     }
    function getDescription(){
         return $this->description;
     }
    function getImage(){
         return $this->image_dir;
     }
    function getPrice(){
        return $this->price;
    }
    function getOn_sale() {
        return $this->on_sale;
    }
    function getOn_sale_price() {
        return $this->on_sale_price;
    }
    function getStatus() {
        return $this->status;
    }
    function getQuantity() {
        return $this->quantity;
    }
    function getWeight() {
        return $this->weight;
    }
    function getSellerId() {
        return $this->seller_id;
    }
    
    
    function setProductName($product_name){
        $this->product_name = $product_name;
    }
    function setProductid($product_id){
        $this->product_id = $product_id;
    }
    function setCatagory($catagory){
        $this->catagory = $catagory;
    }
    function setdescription($description){
        $this->description = $description;
    }
    function setImage($image_dir){
        $this->image_dir = $image_dir;
    }
    function setPrice($price){
        $this->price = $price;
    }
    function setOn_sale($on_sale) {
        $this->on_sale = $on_sale;
    }
    function setOn_sale_price($on_sale_price) {
        $this->on_sale_price = $on_sale_price;
    }
    function setStatus($status) {
        $this->status = $status;
    }
    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
    function setWeight($weight) {
        $this->weight = $weight;
    }
    function setSellerId($seller_id) {
        $this->seller_id = $seller_id;
    }
}

