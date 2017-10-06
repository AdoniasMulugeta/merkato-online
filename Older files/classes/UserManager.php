<?php
require_once('inc/init.php');
class UserManager {
    private static $_instance,$current_user;
    private $database;
   
    private function __construct() {
        $this->database = Database::getInstance();
    }
    private function userExists($column,$value){
        $result = $this->database->select('users',array($column),"WHERE {$column}='{$value}';");
        if($result && count($result)== 1){
            return true;
        }
        return false;
    }
    
    static function getInstance(){
         if (!isset(self::$_instance)){
             self::$_instance = new UserManager;
         }
         return self::$_instance;
     }  
    static function  getCurrentUser(){
        return self::$current_user;
    }
    static function removeCurrentUser(){
        self::$current_user = NULL;
    }
    static function currentUserExists(){
        return isset(self::$current_user) && Session::exists('user_id');
    }
            
   
    function updateUser(User $new_user){
        $user_id = $new_user->getUserId();
        $first_name = $new_user->getFirstName();
        $last_name = $new_user->getLastName();
        $email = $new_user->getEmail();
        $password = $new_user->getPassword();
        $gender = $new_user->getGender();
        $salt = $new_user->getSalt();
        $group_id = $new_user->getGroupId();
        
        return $this->database->update('users',array('first_name','last_name','email','password','gender','salt','group_id'),
                                                array($first_name,$last_name,$email,$password,$gender,$salt,$group_id),"WHERE user_id = '{$user_id}'");
    }
    function updateAddress(Address $address){
        $address_id = $address->getAddressId();
        $phone = $address->getPhone();
        $address_1 = $address->getAddress_1();
        $address_2 = $address->getAddress_2();
        $country = $address->getCountry();
        $city = $address->getCity();
        return $this->database->update('address',array('phone','address_1','address_2','country','city'),
                                            array($phone,$address_1,$address_2,$country,$city),"WHERE address_id = '{$address_id}'");
    }
    
    function addUser(User $new_user){
        $first_name = $new_user->getFirstName();
        $last_name = $new_user->getLastName();
        $email = $new_user->getEmail();
        $password = $new_user->getPassword();
        $gender = $new_user->getGender();
        $salt = $new_user->getSalt();
        $group_id = $new_user->getGroupId();

        return $this->database->insert('users',array('first_name','last_name','email','password','gender','salt','group_id'),
                                                array($first_name,$last_name,$email,$password,$gender,$salt,$group_id));
    }
    function setAddress($user_id,Address $new_address){
        $phone = $new_address->getPhone();
        $address_1 = $new_address->getAddress_1();
        $address_2 = $new_address->getAddress_2();
        $country = $new_address->getCountry();
        $city = $new_address->getCity();
        if($this->userExists('user_id',$user_id)){
            if($this->database->insert('address',array('phone','address_1','address_2','country','city'),array($phone,$address_1,$address_2,$country,$city))){
                if($address_id = $this->database->getLastInsert()){
                    if($this->database->update('users',array('address_id'),array($address_id),"WHERE user_id = '{$user_id}';")){
                        return true;
                    }
                }
            }
        }
        return true;
    }
    function setUserGroup($user_id,$group_id){
        if($this->userExists('user_id',$user_id)){
             return $this->database->update('users',array('group_id'),array($group_id),"WHERE user_id = '{$user_id}");
        }
    }
    
    function getUserByEmail($email){
        $result = $this->database->select('users',array('*'),"WHERE email = '{$email}';");
        if(count($result)==1){
            $found_user = $result[0];
            $user = new User();
            $user->setUserId($found_user['user_id']);
            $user->setFirstName($found_user['first_name']);
            $user->setLastName($found_user['last_name']);
            $user->setEmail($found_user['email']);
            $user->setPassword($found_user['password']);
            $user->setSalt($found_user['salt']);
            $user->setLastLogin($found_user['last_login']);
            $user->setJoinedDate($found_user['joined_date']);
            return $user;
        }
        return false;
    }
    function getUserById($user_id){
        $result = $this->database->select('users',array('*'),"WHERE user_id = '{$user_id}';");
        if(count($result)==1){
            $found_user = $result[0];
            $user = new User();
            $user->setUserId($found_user['user_id']);
            $user->setFirstName($found_user['first_name']);
            $user->setLastName($found_user['last_name']);
            $user->setEmail($found_user['email']);
            $user->setPassword($found_user['password']);
            $user->setSalt($found_user['salt']);
            $user->setLastLogin($found_user['last_login']);
            $user->setJoinedDate($found_user['joined_date']);
            $user->setAddressId($found_user['address_id']);
            return $user;
        }
        return false;
    }
    function getAddressById($address_id){
        $result = $this->database->select('address',array('*'),"WHERE address_id ='{$address_id}';");
        if(count($result) == 1){
            $result = $result[0];
            $found_address = new Address();
            $found_address->setAddressId($result['address_id']);
            $found_address->setAddress_1($result['address_1']);
            $found_address->setAddress_2($result['address_2']);
            $found_address->setCountry($result['country']);
            $found_address->setCity($result['city']);
            $found_address->setPhone($result['phone']);
            
            return $found_address;
        }
        else{
            return false;
        }
    }

    function login(User $user_data){
       $email = $user_data->getEmail();
       $password = $user_data->getPassword();
       $user = $this->getUserByEmail($email);
       if($user){
           if($user->getEmail() == $email){
               $password .= $user->getsalt();
               $password = Hash::generateHash($password);
               if($password == $user->getPassword()){
                   self::$current_user = $user;
                   self::$current_user->getFirstName();
                   return true;
                }//else echo "wrong password";   
            }//else echo "email not found";  
        }
        return false;
     }
}
