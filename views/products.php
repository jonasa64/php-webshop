<?php
$title = "products";
include_once dirname(dirname(__FILE__)) . "/shared/header.php";?>

<div class="container mt-4">
<div class="row">
    <?php
$query = "SELECT * FROM products";
$stmt = mysqli_query($connection, $query);

while ($rows = mysqli_fetch_assoc($stmt)){
    $id = $rows['id'];
    $name = $rows['name'];
    $price = $rows['price'];
    $description = $rows['description'];
    $image = $rows['image_url'];
 ?>

    <div class="col-4">
        <?php echo "<p>$name</p>"?>
        <img src="<?php echo $image?>" alt="<?php echo $name?>">
        <?php echo "<p>$price</p>"?>
        <?php echo  "<p>$description</p>"?>
        <form method="post" action="cart.php">
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input class="form-control" id="quantity" type="text" name="quantity" value="1"/>
            </div>
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <input type="hidden" name="name" value="<?php echo $name;?>"/>
            <input type="hidden" name="price" value="<?php echo $price;?>"/>
            <input class="btn btn-primary" type="submit" name="add_to_cart" value="Add to card"/>
        </form>
    </div>
<?php }

include_once dirname(dirname(__FILE__)) . "/shared/footer.php";
?>


