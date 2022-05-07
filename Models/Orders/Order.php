<?php 

class Order {
    public $id;
    public $totalPrice;
    public $orderLines = array();
    public $status;
    public $orderDate;


    /**
     * Undocumented function
     *
     * @param int|array $identifiers
     * @return array|null
     */
    public function get($identifiers){
        
        if(!isset($identifiers) || empty($identifiers))
            return null;

        // Check if identifiers is array and length is 0
        if(is_array($identifiers) && count($identifiers) == 0)
            return null;
        // Check that identifers is int
        if(is_int($identifiers) && !is_numeric($identifiers)){

        }
            return null;
        // check that identifers is array and have a length
        if(is_array($identifiers) && count($identifiers) > 0){

        } 
        

    }

    public function reject(){

    }

    public function approve(){

    }

    public function cancel(){
        
    }

}