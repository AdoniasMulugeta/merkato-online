<?php
require_once('inc/init.php');
if(!Session::exists('user_id'))
   header("Location:signin.php?redirected-from={$_SERVER['SCRIPT_NAME']}&message=Please+signin+first"); 

$user_manager = UserManager::getInstance();
$current_user = $user_manager->getUserById(Session::get('user_id'));
if(empty($current_user->getAddressId())){
    header("Location:addAddress.php?redirected-from=account.php&message=you+need+to+complete+your+account+details");
}
?>
<h1>Welcome Mr. <?=$current_user->getFirstName()?></h1>
<ul>
    <li><a href="addProduct.php">add product to sell</a></li>
    <li><a href="updateAccount.php">update profile</a></li>
    <li><a href="sellerProductList.php">view products under this account</a></li>
    <li><a href="addProduct.php">view orders made to your products</a></li>
</ul>