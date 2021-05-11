<?php
include_once dirname(dirname(__FILE__)) . "/shared/header.php";
session_destroy();
redirect("views/index.php");
include_once dirname(dirname(__FILE__)) . "/shared/footer.php";