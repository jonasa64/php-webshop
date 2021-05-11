<?php
$title = "register";
include_once dirname(dirname(__FILE__)) ."/shared/header.php";

?>
    <form method="post" action="register.php">
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" id="username" type="text" name="username"/>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" class="form-control" type="password" name="password"/>
    </div>

    <div class="form-group">
        <label for="confirm_password">Confirm password</label>
        <input class="form-control" id="confirm_password" type="password" name="confirm_password"/>
    </div>

    <input type="submit" value="Register" name="register" class="btn btn-primary"/>
</form>

<?php

if(isset($_POST["register"])){
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    //check for empty input values
    if(isEmpty($POST)){
        set_session_message("pleas fill all the fileds", "danger");
        redirect("views/register.php");
    }

    //check if password and confirm_password match
    if($POST["password"] != $POST["confirm_password"]){
        set_session_message("password and confirm password need to match", "danger");
        redirect("views/register.php");
        }
            register();


}

include_once dirname(dirname(__FILE__)) . "/shared/footer.php";