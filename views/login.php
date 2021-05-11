<?php
$title = "login";
include_once dirname(dirname(__FILE__)) . "/shared/header.php";?>
<form method="post" action="login.php">
    <div class="form-group">
        <label for="username">Enter username</label>
        <input class="form-control" type="text" name="username" id="username" />
    </div>

    <div class="form-group">
        <label for="password">Enter password</label>
        <input class="form-control" type="password" name="password" id="password"  />
    </div>


    <input class="btn btn-primary" type="submit" value="Login" name="Submit"/>
</form>

<?php


if(isset($_POST['Submit'])){
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    if(isEmpty($POST)){
    login($POST['username'], $POST['password']);
    }else {
        set_session_message("username and password can not be empty", "danger");
       redirect("views/login.php");
    }


}

include_once dirname(dirname(__FILE__)) . "/shared/footer.php";