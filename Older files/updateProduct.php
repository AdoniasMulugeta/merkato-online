<?php
include_once 'inc/init.php';
if(!Session::exists('user_id'))
   header("Location:signin.php?redirected-from={$_SERVER['SCRIPT_NAME']}&message=Please+signin+first"); 
$product_manager = ProductManager::getInstance();
$catagories = $product_manager->getAllcatagories();
$product = $product_manager->getProductById(Input::get('id','GET'));
$product_name = $product->getProductName();
if(!$product){
    die ('No Product Selected');
}
if(Input::exists('update_product')){
    $validation = new Validate();
    $data_to_validate = array(
        'product_name'=>array('required'=>true,'min'=>5,'max'=>24),
        'quantity'=>array('required'=>true,'min_val'=>1),
        'price'=>array('required'=>true,'min_val'=>1),
        'image'=>array('max_size'=>2097152,'file_type'=>array("jpg","jpeg","png","bmp"))
    );
    $validation->validate($data_to_validate);
    if($validation->passed){
        $new_product = new Product();
        $new_product->setProductid($product->getProductId());
        $new_product->setProductName(Input::get('product_name'));
        $new_product->setdescription(Input::get('description'));
        $new_product->setQuantity(Input::get('quantity'));
        $new_product->setPrice(Input::get('price'));
        $new_product->setCatagory('Laptop');
        $new_product->setSellerId(Session::get('user_id'));
        $new_product->setImage(Input::get('image'));
        
        $name = uniqid("Laptop-");
        $source = Input::get("image",'FILES', 'tmp_name');
        $catagory = $product->getCatagory();
        $destination = "images/{$name}";
        $new_product->setImage($destination);
        if(copy($source, $destination)){
            if($product_manager->updateProduct($new_product)){
                echo "<p>Update Successfull.</p>";
                header("Location:#");
            }
            else {
                echo 'problem with updating';    
            }
        }
        else {
            echo 'Error Updating';
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
    <link rel="stylesheet" type="text/css" href="css/update_product.css">
	<title>SELL LAPTOP MERKATO ONLINE</title>
</head>
<body>
    <a href="home.php"><img src="images/sell/logoRed.png"></a>
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
                <img src=<?=$product->getImage()?>>
            </p>
            <p>
                Product name <br>
                <input type="text" name="product_name" value="<?=$product_name?>">
            </p>

            <p>
                 Description:
        <textarea id="discription" cols="40" name="description" rows="5" placeholder="Provide a link to detail page if avalable."><?=$product->getDescription()?></textarea>
            </p>
            
            <p>
                Provide picture:
                <input width="100px" type="file" accept="image/*" name="image" id="file">
            </p>
            <p>
                Quantity <br>
                <input type="number" name="quantity" class="number" value=<?=$product->getQuantity()?>>
            </p>
            <p>
                Unit Price <br>
                <input type="number" name="price" class="number" value=<?=$product->getPrice()?>>
            </p>
            <p>
                <input type="submit" name="update_product" value="Update Product" id="submit">
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