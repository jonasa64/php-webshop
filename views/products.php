<?php
$title = "Products";
include_once dirname(dirname(__FILE__)) . "/shared/header.php";
?>

<div class="container mt-4">
    <div class="row">
        <?php foreach($data as $product): ?>
            <div class="col-4">
                <div class="card">
                <img class="card-img-top mt-3" src="<?=$product->image?>" alt="<?= $product->name?>"/>
                <div class="card-body">
                <h5 class="card-title"><?=$product->name?></h5>
                <a href="#" class="btn btn-primary">Show</a>
                </div>

                </div>
            </div>
            <?php endforeach; ?>
    </div>

</div>



