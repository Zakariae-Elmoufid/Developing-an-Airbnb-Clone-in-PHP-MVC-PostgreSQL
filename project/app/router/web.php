<?php 

use App\core\Router; 
Router::add("GET","/","HomeController@index");

Router::add("GET","/dashboard","OwnerController@dashboardCategories");
Router::add("POST","/dashboard/create", "OwnerController@create");
