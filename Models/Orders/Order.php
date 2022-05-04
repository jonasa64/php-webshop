<?php 

class Order {
    public $id;
    public $totalPrice;
    public $orderLines = array();
    public $status;


    /**
     * Undocumented function
     *
     * @param int|array $identifiers
     * @return array|null
     */
    public function get($identifiers){

    }

    public function reject(){

    }

    public function approve(){

    }

    public function cancel(){
        
    }

}