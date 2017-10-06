<?php
session_start();
define('BR','</br>');
define('HOME_PAGE', '/e-commerce/new/home.php');
define('SIGNIN_PAGE', '/e-commerce/new/signin.php');
define('SIGNUP_PAGE', '/e-commerce/new/signup.php');
define('LOGOUT_PAGE', '/e-commerce/new/logout.php');
define('SELL_PAGE', '/e-commerce/new/sell.php');
define('ADD_PRODUCT', '/e-commerce/new/addProduct.php');
define('UPDATE_PRODUCT', '/e-commerce/new/updateProduct.php');
define('VIEW_ORDERS', '/e-commerce/new/viewOrders.php');
define('VIEW_PRODUCTS', '/e-commerce/new/viewProducts.php');
define('ACCOUNT', '/e-commerce/new/account.php');
define('UPDATE_ACCOUNT', '/e-commerce/new/updateAccount.php');
spl_autoload_register(function($file_name){
    if(file_exists("classes/{$file_name}.php")){
        require_once "classes/{$file_name}.php";
    }
    else if (file_exists("../classes/{$file_name}.php")) {
        require_once "../classes/{$file_name}.php";
    }
    else if (file_exists("./{$file_name}.php")) {
        require_once "./{$file_name}.php";
    }
});
