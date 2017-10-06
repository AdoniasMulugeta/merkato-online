<?php
class Address{
    private $address_id;
    private $address_1;
    private $address_2;
    private $city;
    private $country;
    private $phone;
    
    function setAddressId($address_id) {
        $this->address_id = $address_id;
    }

    function setAddress_1($address_1) {
        $this->address_1 = $address_1;
    }

    function setAddress_2($address_2) {
        $this->address_2 = $address_2;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setCountry($country) {
        $this->country = $country;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

        
    public function getAddressId(){
        return $this->address_id;
    }
    public function getAddress_1(){
        return $this->address_1;
    }
    public function getAddress_2(){
        return $this->address_2;
    }
    public function getCity(){
        return $this->city;
    }
    public function getCountry(){
        return $this->country;
    }
    public function getPhone(){
        return $this->phone;
    }
}