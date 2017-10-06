<?php
class Catagory {
    private $catagory_id;
    private $catagory_name;
    private $description;
    private $image;
    private $parent_catagory_id;
    
    public function getCatagoryId(){
        return $this->catagory_id;
    }
    public function getCatagoryName(){
        return $this->catagory_name;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getImage(){
        return $this->image;
    }
    public function getParentId(){
        return $this->parent_catagory_id;
    }
    
    public function setCatagoryName($catagory_name){
        $this->catagory_name = $catagory_name;
    }
    public function setCatagoryID($catagory_id){
        $this->catagory_id = $catagory_id;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setImage($image){
        $this->image = $image;
    }
    public function setParentId($parent_id){
        $this->parent_catagory_id = $parent_id;
    }
}
