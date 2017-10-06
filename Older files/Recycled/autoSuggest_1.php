<?php
require_once('inc/init.php');
if(Input::exists('key','GET')){
    $manager = ProductManager::getInstance();
    $product = new Product();
    $product_found = $manager->searchProductByName(Input::get('key','GET'));
    $count = 0;
    if($product_found && $count<6){
        $count++;
        $string = '<data>';
        foreach ($product_found as $product){
            $string .= "<name>".$product['product_name']."</name>";
        }
        $string .= '<data>';
    }
    
    else{
        print ("<data>"
                    . "<input></input>"
                    . "<input></input>"
                    . "<input></input>"
                    . "<input></input>"
                    . "<input></input>"
                    . "<input></input>"
            . "</data>");
    }
}
