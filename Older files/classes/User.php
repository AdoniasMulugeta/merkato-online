<?php
class User{
    private $user_id,$first_name,$last_name,$email,$password,$gender,$group_id,$salt,$joined_date,$last_login,$address_id;
    function __construct($first_name='',$last_name='',$email='',$password='',$gender='',$group_id=''){
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->password = $password;
            $this->gender = $gender;
    }
//    function __construct(){}
    function getUserId (){
            return $this->user_id;
    }
    function getFirstName (){
            return $this->first_name;
    }
    function getLastName (){
            return $this->last_name;
    }
    function getEmail (){
            return $this->email;
    }
    function getPassword (){
            return $this->password;
    }
    function getGender (){
            return $this->gender;
    }
    function getsalt (){
            return $this->salt;
    }
    function getJoinedDate (){
            return $this->joined_date;
    }
    function getLastLogin (){
            return $this->last_login;
    }
    function getGroupId (){
            return $this->group_id;
    }

    function getAddressId() {
        return $this->address_id;
    }

    function setAddressId($address_id) {
        $this->address_id = $address_id;
    }

        function setUserId ($user_id){
            $this->user_id = $user_id;
    }
    function setFirstName ($first_name){
            $this->first_name = $first_name;
    }
    function setLastName ($last_name){
            $this->last_name = $last_name;
    }
    function setEmail ($email){
            $this->email = $email;
    }
    function setPassword ($password){
            $this->password = $password;
    }
    function setGender ($gender){
            $this->gender = $gender;
    }
    function setSalt ($salt){
            $this->salt = $salt;
    }
    function setJoinedDate ($joined_date){
            $this->joined_date = $joined_date;
    }
    function setLastLogin ( $last_login){
            $this->last_login = $last_login;
    }
    function setGroupId ( $group_id){
            $this->group_id = $group_id;
    }
}

?>
