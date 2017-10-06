<?php
require_once('inc/init.php');
$manager = ProductManager::getInstance();
$new_product = new Product();
//if(Input::exists("search",'GET')){
//    $product_found = $manager->searchProductByName(Input::get('search_field','GET'));
//    echo Input::get('search_field','GET');
//    if($product_found){
//        echo "id = ".$product_found->getProductId().BR;
//       echo "Name = ".$product_found->getProductName().BR;
//        echo "Catagory = ".$product_found->getCatagory()->getCatagoryName().BR;
//        echo "price = ".$product_found->getPrice().BR;
//    }else{
//        echo "No product found";
//    }
//}






$new_product->setProductName("Alienware X51");
$new_product->setdescription("Alienware X51 AX51R2-5724BK Desktop (3.0 GHz Intel Core i5-4430 Processor, 8GB DDR3, 1TB HDD, 32GB SSD, NVIDIA GeForce GTX 645, Windows 8) Black [Discontinued By Manufacturer]");
$new_product->setCatagory('Desktop');
$new_product->setPrice(999.90);
$new_product->setQuantity(4);
$new_product->setimage("images/Desktop/b.jpeg");
if($manager->addProduct($new_product)){
    echo "success";
}
else{
    echo "fail";
}
?>
<!--<form method="get" action="">
    <input type="text" name="search_field" placeholder="Search">
    <input type="submit" name="search" value="Search">
</form>
<form method="POST" action="#">
    <input type="text" name="product_name"  placeholder="Product name">
    <input type="text" name="description"   placeholder="Description">
    <input type="text" name="category"      placeholder="category">
    <input type="text" name="image"         placeholder="Product Image">
    <input type="text" name="price"         placeholder="Price">
    <input type="submit" name="add_product" value="Add Product">
</form>-->
