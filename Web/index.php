<?php 

define('WEB', str_replace("Web/index.php", "",  $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Web/index.php", "", $_SERVER["SCRIPT_FILENAME"]));


require(ROOT . 'Router.php');
require(ROOT. 'Request.php');
require(ROOT. 'Disipatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();