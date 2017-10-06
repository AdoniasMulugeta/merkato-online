<?php
class ProductManager{
    private static $_instance;
    private $database;
    private function __construct() {
        $this->database = Database::getInstance();
    }
    public function getInstance(){
         if (!isset(self::$_instance)){
            self::$_instance = new ProductManager;
        }
        return self::$_instance;
    }
    
    public function addProduct(Product $product_data){
        $product_name = $product_data->getProductName();
        $description = $product_data->getDescription();
        $image_dir = $product_data->getimage();
        $price = $product_data->getPrice();
        $quantity = $product_data->getQuantity();
        $seller_id = $product_data->getSellerId();
        $catagory = $this->searchCatagoryByName($product_data->getCatagory());
        
        if($catagory){
            $catagory_id = $catagory->getCatagoryId();
            return $this->database->insert('products',array('product_name','description','catagory_id','image_dir','price','quantity','seller_id'),
                                                  array($product_name,$description,$catagory_id,$image_dir,$price,$quantity,$seller_id));
        }
        else{
            echo 'catagoty not found';
        }
    }
    public function addCatagory(Catagory $new_catagory){
        $catagory_name = $new_catagory->getCatagoryName();
        $description = $new_catagory->getDescription();
        $image = $new_catagory->getImage();
        $parent_catagory_id = $new_catagory->getParentId();
        return $this->database->insert('catagories',array('catagory_name','description','image','parent_catagory_id'),
                                                    array($catagory_name,$description,$image,$parent_catagory_id));
    }
    
    public function updateProduct(Product $product){
        $product_id = $product->getProductid();
        $product_name = $product->getProductName();
        $description = $product->getDescription();
        $image_dir = $product->getimage();
        $price = $product->getPrice();
        $quantity = $product->getQuantity();
        $seller_id = $product->getSellerId();
        $catagory = $this->searchCatagoryByName($product->getCatagory());
        
        if($catagory){
            $catagory_id = $catagory->getCatagoryId();
            return $this->database->update('products',array('product_name','description','catagory_id','image_dir','price','quantity','seller_id'),
                      array($product_name,$description,$catagory_id,$image_dir,$price,$quantity,$seller_id),"WHERE product_id = '{$product_id}'");
        }
    }
    public function updateCatagory(Catagory $catagory){
        $catagory_id = $catagory->getCatagoryId();
        $catagory_name = $catagory->getCatagoryName();
        $description = $catagory->getDescription();
        $image = $catagory->getImage();
        $parent_catagory_id = $catagory->getParentId();
        return $this->database->update('catagories', ['catagory_name','description','image','parent_catagory_id'],
                                        [$catagory_name,$description,$image,$parent_catagory_id],"WHERE catagory_id = {$catagory_id}");
    }
    public function getAllCatagories(){
         return $this->database->select('catagories', ['catagory_name']);
    }
    public function getProductByName($product_name){
        $result = $this->database->select('products',['*'],"WHERE product_name = '{$product_name}';");
        if(count($result) >= 1){
           $product = new Product();
           $product_found = $result[0];
           $product->setProductid($product_found['product_id']);
           $product->setProductName($product_found['product_name']);   
           $product->setdescription($product_found['description']);
           $product->setimage($product_found['image_dir']);
           $product->setPrice($product_found['price']);
           $product->setQuantity($product_found['quantity']);
           if ($catagory = $this->searchCatagoryById($product_found['catagory_id'])) {
                $product->setCatagory($catagory);
            }
            return $product;
        }
    }
    
    public function getProductById($product_id){
        $result = $this->database->select('products',['*'],"WHERE product_id = '{$product_id}';");
        if(count($result) == 1){
           $product = new Product();
           $product_found = $result[0];
           $product->setProductid($product_found['product_id']);
           $product->setProductName($product_found['product_name']);   
           $product->setdescription($product_found['description']);
           $product->setimage($product_found['image_dir']);
           $product->setPrice($product_found['price']);
           $product->setQuantity($product_found['quantity']);
           if ($catagory = $this->searchCatagoryById($product_found['catagory_id'])) {
                $product->setCatagory($catagory);
            }
            return $product;
        }
    }
    public function searchCatagoryById($catagory_id){
        $result_all = $this->database->select('catagories',array('*'),"WHERE catagory_id = '{$catagory_id}';");
        if (count($result_all) == 1) {
            $result = $result_all[0];
            $found_catagory = new Catagory();
            $found_catagory->setCatagoryID($result['catagory_id']);
            $found_catagory->setCatagoryName($result['catagory_name']);
            $found_catagory->setDescription($result['description']);
            $found_catagory->setImage($result['image']);
            $found_catagory->setParentId($result['parent_catagory_id']);  
            return $found_catagory;
        } else {
            return false;
        }   
    }
    public function searchCatagoryByName($catagory_name){
        $result_all = $this->database->select('catagories',  ['*'],"WHERE catagory_name = '{$catagory_name}';");
        if (count($result_all) == 1) {
            $result = $result_all[0];
            $found_catagory = new Catagory();
            $found_catagory->setCatagoryID($result['catagory_id']);
            $found_catagory->setCatagoryName($result['catagory_name']);
            $found_catagory->setDescription($result['description']);
            $found_catagory->setImage($result['image']);
            $found_catagory->setParentId($result['parent_catagory_id']);  
            return $found_catagory;
        } else {
            return false;
        }
    }

    public function searchProductByName($product_name){
        $result = $this->database->select('products',  ['*'],"WHERE product_name LIKE '{$product_name}%';");
        if(count($result)>0){
            return $result;
        }
        else {
            return false;
        }
    }
    public function searchProductBySeller($seller_id){
        $result = $this->database->select('products',  ['*'],"WHERE seller_id = '{$seller_id}';");
        if(count($result) >= 1){
            return $result;
        }
        else {
            return false;
        }
    }
    public function searchProductByCatagory($catagory_name){
        $catagory_result = $this->searchCatagoryByName($catagory_name);
        if($catagory_result){
            $catagory_id = $catagory_result->getCatagoryId();
            $result = $this->database->select('products',array('*'),"WHERE catagory_id = '{$catagory_id}%'");        
            if(count($result)>0){
                return $result;
            }
        }
        return false;
    }
    public function searchProductByCatagoryAndName($catagory_name,$name){
        $catagory_found = $this->searchCatagoryByName($catagory_name);
        if($catagory_found){
            $catagory_id = $catagory_found->getCatagoryId();
            $result = $this->database->select('products',array('*'),"WHERE catagory_id = '{$catagory_id}' AND product_name LIKE '{$product_name}%'");
        }else{
            $result = $this->database->select('products',array('product_name'),"WHERE  product_name LIKE '{$product_name}%'");
        }
        if(count($result)>0){
            return $result;
        }
        else {
            return false;
        }
    }
    
}

