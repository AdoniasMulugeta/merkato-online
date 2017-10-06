<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/e-commerce/inc/init.php');
if(Input::get('submit')){
    $image_name = Input::get('image','POST','tmp_name');
    if(FileManager::resizeImage($image_name, 28, 28)){
        echo 'success';
    }
}
?>

<form action="#" method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="submit">
</form>
