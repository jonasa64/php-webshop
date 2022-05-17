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

    public function get($identifiers){

        // Check if identifiers is array with a length of 0 
        if(is_array($identifiers) && count($identifiers) == 0) return null;

        if(!is_array($identifiers) && empty($identifiers)) return null;

        // Check if identifers is not array and not int
        if(!is_array($identifiers) && !is_int($identifiers)) return null;

        if(is_array($identifiers) && count($identifiers) > 0){
            $users = [];

            $sql = "SELECT id, first_name, last_name, email, is_admin FROM users WHERE id IN(". implode(",", $identifiers) . ")";
            $query = \PHPSHOP\DB\DB::query($sql);
            
            while($row = $query->fetch_assoc()){
                $this->id = $row["id"];
                $this->firstName = $row["first_name"];
                $this->lastName = $row["last_name"];
                $this->email = $row["email"];
                $this->isAdmin = $row["is_admin"];
                $users[] = $this;
            }

            return $users;
        }

        if(!is_array($identifiers) && is_int($identifiers)){

            return $this;
        }

        return null;

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