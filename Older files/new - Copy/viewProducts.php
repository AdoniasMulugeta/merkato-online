<?php
require_once('inc/init.php');
if(!Session::exists('user_id'))
   header("Location:signin.php?redirected-from={$_SERVER['SCRIPT_NAME']}&message=Please+signin+first"); 

$user_manager = UserManager::getInstance();
$current_user = $user_manager->getUserById(Session::get('user_id'));
if(empty($current_user->getAddressId())){
    header("Location:addAddress.php?redirected-from=sellerProductList.php&message=you+need+to+complete+your+account+details");
}
$product_manager = ProductManager::getInstance();
$products = $product_manager->searchProductBySeller($current_user->getUserId());

?>
<?php if($products):?>

<?php foreach ($products as $product): ?>
<aside>
    <a href='updateProduct.php?id=<?=$product['product_id']?>'><img src=<?=$product['image_dir']?>></a>
    <div>
        <span>by <?=$current_user->getFirstName()?></span>
        <h3><a href='updateProduct.php?id=<?=$product['product_id']?>'><?=$product['product_name']?></a></h3>
        <ul><li><?=$product['description']?></li></ul>
        <aside>
            <a href='#'>Price: <?=$product['price']?> ETB</a><br>
        </aside>
    </div>
</aside>
<?php endforeach;?>
<?php endif;?>