<?php

namespace PHPSHOP;

require(dirname(dirname(__FILE__)) . "/vendor/autoload.php");

define('WEB', str_replace("Web/index.php", "",  $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Web/index.php", "", $_SERVER["SCRIPT_FILENAME"]));


require(ROOT . 'Router.php');
require(ROOT. 'Request.php');
require(ROOT. 'Dispatcher.php');
require(ROOT . 'DB/DB.php');
require(ROOT. 'Connection.php');
require(ROOT . 'Controllers/Controller.php');
$dispatch = new Dispatcher();
$dispatch->dispatch();