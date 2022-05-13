<?php 

namespace PHPSHOP\Controllers\Products;

use PHPSHOP\Controllers\Controller;
use PHPSHOP\Models\Products\Product as ProductsProduct;

class Product extends Controller {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index() {

        $sql = "SELECT id FROM products";
        $result = \PHPSHOP\DB\DB::query($sql);
        $productModel = new ProductsProduct();
       $products =  $productModel->get($result->fetch_assoc());
        $this->renderView("products", $products);
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

