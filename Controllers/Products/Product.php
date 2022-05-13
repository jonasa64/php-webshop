<?php 

namespace PHPSHOP\Controllers\Products;

use PHPSHOP\Controllers\Controller;

class Product extends Controller {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index() {

        $sql = "SELECT * FROM products";
        $result = \PHPSHOP\DB\DB::query($sql);
        print_r($result->fetch_assoc());
    }

    public function show(int $id){
        $sql = "SELECT * FROM products WHERE id = ?";

    }

    public function destroy(int $id){
    $sql = "DELETE FROM products WHERE id = ?";
    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){
        
    }


}

