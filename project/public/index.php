<?php
require dirname(__DIR__).'/vendor/autoload.php';


use App\config\Database;
use App\core\Router; 

require dirname(__DIR__).'/app/router/web.php';


Router:: dispatch();

