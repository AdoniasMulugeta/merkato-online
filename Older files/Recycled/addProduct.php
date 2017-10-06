<?php
include_once 'inc/init.php';

$product = new Product();
$product->setProductName(Input::get('product_name'));
$product->setdescription(Input::get('description'));
$product->setCatagory(Input::get('catagory'));
$product->setimage(Input::get('image'));
$product->setPrice(Input::get('price'));
$product->setQuantity(Input::get('quantity'));

$product_manager = new ProductManager();
$success = $product_manager->addProduct($product);
if($success){
    header("Location:productDetail.php");
}