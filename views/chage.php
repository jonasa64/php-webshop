<?php
include_once dirname(dirname(__FILE__)) . "/shared/header.php";
include_once dirname(dirname(__FILE__)) . "/vendor/inacho/php-credit-card-validator/src/CreditCard.php";
if(isset($_POST['Submit'])){
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);


    if(isEmpty($POST)){
        $card =   \Inacho\CreditCard::validCreditCard($POST["ccn"]);
        if($card["valid"] == 1){
            createNewOrder();
            set_session_message("your order was successful","success" );
            redirect("views/thank_you.php");

        }
            set_session_message("card number is not valid","danger" );
            redirect("views/checkOut.php");


    }
        set_session_message("pleas fill in all required values","danger" );
        redirect("views/checkOut.php");




}
include_once dirname(dirname(__FILE__)) . "/shared/footer.php";