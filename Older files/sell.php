<?php
require_once 'inc/init.php';
if(Session::exists('user_id')){
    $user_manager = UserManager::getInstance();
    $current_user = $user_manager->getUserById(Session::get('user_id'));
}
else{
    header("Location:signin.php?redirected-from=sell.php");
}
?>
<h1>Welcome Mr. <?=$current_user->getFirstName()?></h1>
