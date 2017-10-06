<?php
session_start();
define('BR','</br>');
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
