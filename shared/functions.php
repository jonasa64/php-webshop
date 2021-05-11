<?php

// function for cart
function display_cart(){
    foreach ($_SESSION['shopping_cart'] as $key => $value){
        echo " <tr>
            <td>". $value["item_name"] . "</td>
            <td>" . $value['item_price'] . " kr</td>
            <td>" . $value["quantity"] . "</td>
            <td>" . number_format($value["quantity"] * $value["item_price"], 2 ) ." kr</td>
            <td><a href=cart.php?action=delete&item_id=" . $value['item_id'] . ">Remove</a></td>
        </tr>";

    }

}

function remove_from_cart(){
    if(isset($_GET['action'])){
        //loops over the cart
        foreach ($_SESSION['shopping_cart'] as $key => $value){
            if($_GET['item_id'] == $value['item_id']){
               //removes the item from the cart
                unset($_SESSION['shopping_cart'][$key]);
                echo '<script>alert("Item Removed)</script>';
                echo '<script>window.location="cart.php"</script>';

            }
        }
    }
}

function add_to_cart(){
    if(isset($_POST['add_to_cart'])){
        //check if shopping cart exits
        if(isset($_SESSION['shopping_cart'])){
            $item_array_id = array_column($_SESSION['shopping_cart'], 'item_id');
            //check if item is allready in cart
            if(!in_array($_POST['id'], $item_array_id)){
                $count = count($_SESSION['shopping_cart']);
                $item_array = array(
                    'item_id' => $_POST['id'],
                    'item_name' => $_POST['name'],
                    'item_price' => $_POST['price'],
                    'quantity' => $_POST['quantity']
                );
                $_SESSION['shopping_cart'][$count] = $item_array;
            }else {
                echo '<script>alert("Item Already Added")</script>';
                echo '<script>window.location="products.php"</script>';
            }
        }else {
            //add a item to shopping cart if shopping cart does not exits
            $item_array = array(
                'item_id' => $_POST['id'],
                'item_name' => $_POST['name'],
                'item_price' => $_POST['price'],
                'quantity' => $_POST['quantity']
            ) ;
            $_SESSION['shopping_cart'][0] = $item_array;
        }
    }
}

function getCartTotal(){
    $total = 0;
    foreach ($_SESSION['shopping_cart'] as $key => $value){
            $total += number_format($value["quantity"] * $value["item_price"], 2 );

    }

    return $total;
}

function getItemsInCart(){
    return count($_SESSION["shopping_cart"]);
}

//auth functions

function register(){
    global $connection;
    // sanitize user input
    $username =  filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    if(findUser($username)){
        $query = mysqli_prepare($connection, "INSERT INTO users(username, password)VALUES(?, ?)");
        //password hashing
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        mysqli_stmt_bind_param($query, "ss", $username, $hashedPassword);
        if(!mysqli_stmt_execute($query)){
            die("query falied " . mysqli_error($connection));
        } else {
            redirect("views/login.php");
        }
    }

}

// check if username is taken
function findUser($username) {
    global $connection;
    $query = mysqli_prepare($connection, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($query, "s", $username);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    if(mysqli_num_rows($result) == 1){
        return false;
    }

    return true;
}


function login($username, $password){
    global $connection;
    $hashedPassword = validatePassword($username,$password );
    $query = mysqli_prepare($connection, "SELECT id, username FROM users WHERE username = ? and password = ?");
    if(!is_null($hashedPassword)){
        mysqli_stmt_bind_param($query, "ss", $username, $hashedPassword);
        if(!mysqli_stmt_execute($query)){
            die("query failed " . mysqli_error($connection));
        }
        $result = mysqli_stmt_get_result($query);
        $row = mysqli_fetch_assoc($result);
        // set the session vars
        $_SESSION["username"] = $row["username"];
        $_SESSION["id"] = $row["id"];
        set_session_message("logged in was successful", "success");
        redirect("views/products.php");
    }
    set_session_message("auth failed", "danger");
    redirect("views/login.php");

}

function validatePassword($username, $password){
    global  $connection;
    $query = mysqli_prepare($connection, "SELECT password FROM users WHERE username = ?");
    mysqli_stmt_bind_param($query, "s", $username);
    if(!mysqli_stmt_execute($query)){
        die("query failed " . mysqli_error($connection));
    }
    $result = mysqli_stmt_get_result($query);
    if(mysqli_num_rows($result) == 1){
        while ($row = mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
                return $row['password'];
            }
        }
    }
    set_session_message("auth failed", "danger");
    return null;

}


function isLoggedIn(){
    if($_SESSION['username']){
        return true;
    }

    return false;
}

//order and order details functions

//find all orders for a user
function orderById($userId){
    global $connection;
    $query = mysqli_prepare($connection, "SELECT orders.id, orders.Total_price, orders.Order_date, users.username FROM orders join users on orders.user_id = users.id WHERE orders.user_id = ? ORDER BY id DESC ");
    mysqli_stmt_bind_param($query, "i", $userId);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    if(mysqli_num_rows($result) == 0){
        return "You have No orders";
    }
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $total_price = $row['Total_price'];
        $order_date = $row['Order_date'];
        $username = $row['username'];
        echo "
       <tr>
           <td>$id</td>
           <td>$total_price</td>
           <td>$order_date</td>
           <td>$username</td>
           <td><a href='http://localhost:81/phpShop/views/orderDetails.php?order_id=$id'>View</a></td>
       </tr>
       ";
    }
}

//create a new order
function createNewOrder(){
    global $connection;
    $query = mysqli_prepare($connection, "INSERT INTO orders(total_price, user_id)VALUES(?,?)");
    mysqli_stmt_bind_param($query, "di", getCartTotal(),$_SESSION['id']);
    if(mysqli_stmt_execute($query)){
        // create order details for the order
        createOrderDetails(mysqli_insert_id($connection));
        // empty the shopping cart
        unset($_SESSION['shopping_cart']);
    } else {
        set_session_message("failed to create order", "danger");
    }

}

function createOrderDetails($orderId){
    global $connection;
    $query = mysqli_prepare($connection, "INSERT INTO orderdeatils(quantity, order_id, product_id)VALUES(?,?,?)");
    foreach ($_SESSION['shopping_cart'] as $key => $value){
        mysqli_stmt_bind_param($query, "iii", $value["quantity"], $orderId, $value['item_id']);
        mysqli_stmt_execute($query);

    }
}

function orderDetailsForOrder($orderId){
    global $connection;
    $query = mysqli_prepare($connection, "SELECT 	quantity, name, price FROM orderdeatils join products on products.id = orderdeatils.product_id WHERE orderdeatils.order_id = ?");
    mysqli_stmt_bind_param($query, "i", $orderId);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);

    while($row = mysqli_fetch_assoc($result)){
        $quantity = $row['quantity'];
        $name = $row['name'];
        $price = $row['price'];
        echo "
       <tr>
           <td>$quantity</td>
           <td>$name</td>
           <td>$price</td>
       </tr>
       ";
    }
}

// helpers

// flash message
function set_session_message($message, $class){
    $_SESSION["message"] = $message;
    $_SESSION["class"] = $class;
}

// redirect
function redirect($path){
    header("Location: " . "http://localhost:81/phpShop/" . $path);
    exit();
}

// check if input fields are empty
function isEmpty($array){
    foreach ($array as $key => $value){
        if(empty($value)){
            return false;
        }
    }
    return true;
}
