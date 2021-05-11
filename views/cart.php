<?php
$title = "cart";
include_once dirname(dirname(__FILE__)) . "/shared/header.php";?>
<?php
add_to_cart();

remove_from_cart();

?>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>

<?php
if(!empty($_SESSION['shopping_cart'])){

    display_cart();
    }
 else {
    echo "cart is empty";
}

?>
    </table>
</div>
<p>Total <?php echo getCartTotal();?> kr</p>
<a class="btn btn-primary" href="products.php">continue shopping</a>
<a class="btn btn-primary" href="checkOut.php">Go to check out</a>

<?php include_once dirname(dirname(__FILE__)) . "/shared/footer.php";?>