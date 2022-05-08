<?php 

namespace PHPSHOP\Models\Users;

class User {

    public $id;
    public $firstName;
    public $lastName;
    public $password;
    public $email;
    public $isAdmin;
    public $isGuest;


    public function login(string $email, string $password){

    }

    public function register(array $data){

    }

    public function resetPassword(){

    }

    private function doesUsersExist(string $email) {
    }

    public function getOrders($identifier){
        if(!isset($identifier) || empty($identifier))
         return null;

        if(is_int($identifier) && is_numeric($identifier)){
            
        }
    }


}