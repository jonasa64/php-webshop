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

      if(is_array($identifiers) && count($identifiers) == 0) return null;

      if(!is_array($identifiers) && empty($identifiers)) return null;

      if(!is_array($identifiers) && !is_int($identifiers)) return null;

      if(is_array($identifiers) && count($identifiers) > 0){
 
        $sql = "SELECT * FROM products WHERE id IN(" . implode(",", $identifiers) . ")";
        $query = \PHPSHOP\DB\DB::query($sql);
         $products = [];
        while($row = $query->fetch_assoc()){
          $this->id = $row["id"];
          $this->name = $row["name"];
          $this->price = $row["price"];
          $this->description = $row["description"];
          $this->image = $row["image_url"];
          $this->status = $row["product_status"];
          $this->quantityInStock = $row["quantity_in_stock"];
         $products[] = $this;
        }

       return $products;
      }

      if(!is_array($identifiers) && is_int($identifiers)){

        $sql = "SELECT * FROM products WHERE id = ?";
        $query = \PHPSHOP\DB\DB::prepare($sql);
        $query->bind_param("i", $identifiers);
        $query->execute();

        while($row = $query->fetch()){
          $this->id = $row["id"];
          $this->name = $row["name"];
          $this->price = $row["price"];
          $this->description = $row["description"];
          $this->image = $row["image_url"];
          $this->status = $row["product_status"];
          $this->quantityInStock = $row["quantity_in_stock"];
        }
        $query = null;
        return $this;
      }


      return null;
    }

}