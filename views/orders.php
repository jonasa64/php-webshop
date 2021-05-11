<?php
$title = "orders";
include_once dirname(dirname(__FILE__)) . "/shared/header.php";
$user_id = htmlspecialchars(strip_tags($_GET['user_id']));
if(!isLoggedIn()){
    set_session_message("pleas login to view your orders", "danger");
    redirect("views/login.php");
}
?>
<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Total price</th>
        <th>Order date</th>
        <th>User name</th>
        <th>View details</th>
    </tr>
<?php
orderById($user_id);

?>
</table>

<?php include_once dirname(dirname(__FILE__)) . "/shared/footer.php";?>