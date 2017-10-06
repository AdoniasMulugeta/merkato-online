<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/e-commerce/inc/init.php');
class FileManager{
    static function resizeImage($image,$desired_width,$desired_height){
        // Content type
        header('Content-Type: image/jpeg');
        // Get new sizes
        list($width, $height) = getimagesize($filename);
        $ratio = $width/$height;
        $newwidth = $desired_width * $ratio;
        $newheight = $desired_height;
        // Load
        $thumbnail = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($name);
        // Resize
        if(imagecopyresized($thumbnail, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height)){
            return $thumbnail;
        }
        return false;
    }
    static function getImage(){}
    static function saveImage($source,$destination,$name){
        $destination = "{$destination}/{$name}";
        if(!copy($source, $destination)){
            return false;
        }
        return true;
    } 
}