<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/e-commerce/inc/init.php');
Session::delete(Session::$USER_SESSION);
UserManager::removeCurrentUser();
header("Location:home.php");