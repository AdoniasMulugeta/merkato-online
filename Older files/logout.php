<?php
include_once 'inc/init.php';
Session::delete(Session::$USER_SESSION);
UserManager::removeCurrentUser();
header("Location:home.php");