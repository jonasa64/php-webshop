<?php 

namespace PHPSHOP\Models\Products;

class Product {
    public $id;
    public $name;
    public $image;
    public $description;
    public $price;
    public $status;
    public $quantityInStock;

      /**
     * Undocumented function
     *
     * @param int|array $identifiers
     * @return array|null
     */
    public function get($identifiers){

    }

}