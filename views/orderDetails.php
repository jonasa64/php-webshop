<?php
$title = "order details";
include_once dirname(dirname(__FILE__)) . "/shared/header.php";
$order_id = htmlspecialchars(strip_tags($_GET['order_id']));
if(!isLoggedIn()){
    set_session_message("pleas login to view orderDetails", "danger");
}
?>
    <table class="table table-bordered">
        <tr>
            <th>Quantity</th>
            <th>Product Name</th>
            <th>Item price</th>
        </tr>

<?php
orderDetailsForOrder($order_id);
?>
    </table>
<?php include_once dirname(dirname(__FILE__)) . "/shared/footer.php"; ?>