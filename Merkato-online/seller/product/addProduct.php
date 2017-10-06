<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/e-commerce/inc/init.php');
if(!Session::exists('user_id'))
   header("Location:".SIGNIN_PAGE."?redirected-from={$_SERVER['SCRIPT_NAME']}&message=Please+signin+first"); 

$user_manager = UserManager::getInstance();
$current_user = $user_manager->getUserById(Session::get('user_id'));
if(Input::exists('add_product')){
    $validation = new Validate();
    $data_to_validate = array(
        'product_name'=>array('required'=>true,'min'=>5),
        'quantity'=>array('required'=>true,'min_val'=>1),
        'price'=>array('required'=>true,'min_val'=>1),
        'image'=>array('max_size'=>2097152,'file_type'=>array("jpg","jpeg","png","bmp"))
    );
    $validation->validate($data_to_validate);
    if($validation->passed){
        $product = new Product();
        $product->setProductName(Input::get('product_name'));
        $product->setdescription(Input::get('description'));
        $product->setQuantity(Input::get('quantity'));
        $product->setPrice(Input::get('price'));
        $product->setCatagory('Laptop');
        $product->setSellerId(Session::get('user_id'));
        
        
        $name = uniqid($product->getCatagory()."-");
        $source = Input::get("image",'FILES', 'tmp_name');
        $destination = UPLOAD_IMAGE_DIR."/$product->getCatagory()";
        if(FileManager::saveImage($source, $destination, $name)){
            $product_manager = ProductManager::getInstance();
            if($product_manager->addProduct($product)){
                echo "<p>OK</p>";
            } 
        }
        else{
            echo "Adding new product Failed";
        }
    }
    else{
        $validation->printErrors();
    }
}
?>
<!DOCTYPE>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?=CSS_DIR?>/sell.css">
	<title>SELL LAPTOP MERKATO ONLINE</title>
</head>
<body>
    <a href="<?=HOME_PAGE?>"><img src="images/sell/logoRed.png"></a>
    <p>Choose Category to sell</p>
    <ul>
            <li><a href="#">Laptop</a></li>
            <li><a href="#">Phone</a></li>
            <li><a href="#">TV</a></li>
            <li><a href="#">Accessories</a></li>
            <li><a href="#">Gaming</a></li>
    </ul>
    <section>
    <h2>Sell Laptops in merkatoOnLine</h2>
    <aside>
        <form  action="#" method="POST" enctype="multipart/form-data">
            <p>
                Product name <br>
                <input type="text" name="product_name" value=<?= Input::get('product_name')?>>
            </p>
            <p>
                 Description:
        <textarea id="discription" cols="40" name="description" rows="5" placeholder="Provide a link to detail page if avalable."><?= Input::get('description')?></textarea>
            </p>
            <p>
                Provide picture:
                <input width="100px" type="file" accept="image/*" name="image" id="file">
            </p>
            <p>
                Quantity <br>
                <input type="number" name="quantity" class="number" value=<?= Input::get('quantity')?>>
            </p>
            <p>
                Unit Price <br>
                <input type="number" name="price" class="number" value=<?= Input::get('price')?>>
            </p>
            <p>
                <input type="submit" name="add_product" value="Submit Product" id="submit">
            </p>
        </form>
        </aside>
    </section>
    <div id="footer">
        <a id="first-a-foot" href="#">Conditions of Use</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Help</a>
        <p>Copy Right 2017, merkatoOnLine.com</p>
    </div>
</body>
</html>