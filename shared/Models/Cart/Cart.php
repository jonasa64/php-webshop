<?php 

class Cart{

public function __construct()
{   
    // Check if shopping cart is set
    if(!isset($_SESSION["shopping_cart"]))
        $_SESSION["shopping_cart"] = [];
    
}

    public function addProduct($productId){

    }

    public function removeProduct($productId){

        if(isset($_GET["remove"])){
            // Loop over cart
            foreach($_SESSION["shopping_cart"] as $key => $value){
                if($_GET["item_id"] == $value["item_id"]){
                    // Remove product from cart
                    unset($_SESSION["shopping_cart"][$key]);
                }
            }
        }

    }

    public function updateQutainty(){

    }

    public function empty(){
        unset($_SESSION["shopping_cart"]);
    }

    public function getCartTotal(){
        $total = 0;
    foreach ($_SESSION['shopping_cart'] as $key => $value){
            $total += number_format($value["quantity"] * $value["item_price"], 2 );

    }

    return $total;
    }

    public function getCartCount(){
        return count($_SESSION["shopping_cart"]);
    }
}