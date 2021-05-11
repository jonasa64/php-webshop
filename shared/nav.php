<nav class="navbar navbar-dark navbar-expand-lg bg-primary mb-4">
        <ul class="navbar-nav  ml-auto">
         <?php
        if(!isset($_SESSION['username']) &&  !isset($_SESSION['role'])){ ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="register.php">Reqister</a></li>
            <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
        <?php }
        else {?>
            <li class="nav-item"><a class="nav-link" href="#"><?php echo $_SESSION['username']?></a></li>
            <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="orders.php?user_id=<?php echo $_SESSION['id']?>">Your orders</a></li>
            <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>


        <?php } ?>
        </ul>
    </nav>