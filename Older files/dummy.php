<?php
require_once('inc/init.php');
$user_manager = UserManager::getInstance();
$result = $user_manager->setAddress(20,'0910015884','alembank','Kolfe Keranyo','Ethiopia','AddisAbaba');
if($result){
    echo 'Adderss OK';
}









//$manager = ProductManager::getInstance();
//$new_product = new Product();
//if(Input::exists("search",'GET')){
//    $product_found = $manager->searchProductByName(Input::get('search_field','GET'));
//    echo Input::get('search_field','GET');
//    if($product_found){
//        echo "id = ".$product_found->getProductId().BR;
//        echo "Name = ".$product_found->getProductName().BR;
//        echo "Catagory = ".$product_found->getCatagory()->getCatagoryName().BR;
//        echo "price = ".$product_found->getPrice().BR;
//    }else{
//        echo "No product found";
//    }
//}






//$new_product->setProductName("Dell Ispiron 56 Laptop");
//$new_product->setdescription("Dell Laptop with 2GB RAM and Corei3 Processor");
//$new_product->setCatagory('Laptop');
//$new_product->setPrice(3400);
//$new_product->setQuantity(45);
//$new_product->setimage("image_directory String");
//if($manager->addProduct($new_product)){
//    echo "success";
//}
//else{
//    echo "fail";
//}
?>
<form method="get" action="">
    <input type="text" name="search_field" placeholder="Search">
    <input type="submit" name="search" value="Search">
</form>
<!--<form method="POST" action="#">
    <input type="text" name="product_name"  placeholder="Product name">
    <input type="text" name="description"   placeholder="Description">
    <input type="text" name="category"      placeholder="category">
    <input type="text" name="image"         placeholder="Product Image">
    <input type="text" name="price"         placeholder="Price">
    <input type="submit" name="add_product" value="Add Product">
</form>-->
