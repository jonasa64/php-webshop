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
        $productModel = new ProductsProduct();
        $product =  $productModel->get($id);
        $this->renderView("product", $product);

    }

    public function destroy(int $id){
        \PHPSHOP\DB\DB::delete("products", $id);
    }

    public function edit($id){
        $productModel = new ProductsProduct();
        $product = $productModel->get($id);
        $this->renderView('editProduct', $product);
    }

    public function update(){

    }

    public function delete($id){
        
    }


}

