<?php
session_start();
ob_start();
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="http://localhost:81/phpShop/shared/style.css" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

<?php include_once dirname(dirname(__FILE__)). "/shared/nav.php"; ?>

