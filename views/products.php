<?php
$title = "Products";
include_once dirname(dirname(__FILE__)) . "/shared/header.php";
?>

<div class="container mt-4">
    <div class="row">
        <?php foreach($data as $product): ?>
            <div class="col-4">
                <p><?=$product->name?></p>
                <img src="<?=$product->image?>" alt="<?= $product->name?>"/>
                <p><?=$product->description?></p>
                <p><?=$product->status?></p>
                <p><?=$product->price?></p>
                <form method="post" action="cart.php">
                    <?php if($product->quantityInStock > 0) : ?>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input class="form-control" id="quantity" type="text" name="quantity" value="1"/>
            </div>
            <input type="hidden" name="id" value="<?php $product->id;?>"/>
            <input type="hidden" name="name" value="<?= $product->name;?>"/>
            <input type="hidden" name="price" value="<?= $product->price;?>"/>
            <input class="btn btn-primary" type="submit" name="add_to_cart" value="Add to card"/>
        </form>
<?php endif; ?>
            </div>
            <?php endforeach; ?>
    </div>

</div>



