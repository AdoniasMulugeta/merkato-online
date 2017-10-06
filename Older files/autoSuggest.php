<?php
require_once('inc/init.php');
if(Input::exists('key','GET')){
    $manager = ProductManager::getInstance();
    $product = new Product();
    $product_found = $manager->searchProductByName(Input::get('key','GET'));
    if($product_found){
        foreach ($product_found as $product){
            echo "<p><a href='#'>".$product['product_name']."</a></p>";
        }
    }
    else{
//        echo '<p>no product found</p>';
    }
}
