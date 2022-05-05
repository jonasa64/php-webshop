<?php 

class User {

    public $id;
    public $firstName;
    public $lastName;
    public $password;
    public $email;
    public $isAdmin;


    public function login(){

    }

    public function register(){

    }

    public function resetPassword(){

    }

    private function doesUsersExist(){

    }

    public function getOrders($identifier){
        if(!isset($identifier) || empty($identifier))
         return null;

        if(is_int($identifier) && is_numeric($identifier)){
            
        }
    }


}