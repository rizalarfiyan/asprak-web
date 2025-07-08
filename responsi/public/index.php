<?php

define('BASE_PATH', rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/'));

require '../vendor/autoload.php';
require '../src/Config/Database.php';
require '../src/Routes.php';
