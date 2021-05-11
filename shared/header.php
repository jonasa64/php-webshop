<?php
session_start();
ob_start();
include_once  dirname(dirname(__FILE__)) . "/Connection.php";
include_once dirname(dirname(__FILE__))  . "/shared/functions.php";
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="http://localhost:81/phpShop/shared/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta charset="UTF-8">
        <title><?php echo $title?></title>
    </head>
    <body>
    <?php
    if(isset($_SESSION['message'])){
        $class = $_SESSION['class'];
    echo "
    <div class='alert alert-$class'] >
        " . $_SESSION['message'] .
        "</div>
    ";
    unset($_SESSION['message']);
    unset($_SESSION['class']);
    }
?>

    <?php
    $conn = new Connection();
   $connection = $conn->getConnection();
    ?>
<?php include_once dirname(dirname(__FILE__)). "/shared/nav.php"; ?>

