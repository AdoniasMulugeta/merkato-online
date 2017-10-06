<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/e-commerce/inc/init.php');
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
    <li><a href="<?=ADD_PRODUCT?>">add product to sell</a></li>
    <li><a href="<?=UPDATE_ACCOUNT?>">update profile</a></li>
    <li><a href="<?=VIEW_PRODUCTS?>">view products under this account</a></li>
    <li><a href="<?=VIEW_ORDERS?>">view orders made to your products</a></li>
</ul>