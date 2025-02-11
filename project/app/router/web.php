<?php 



use App\core\Router; 
Router::add("GET","/","HomeController@index");
Router::add("GET","/register","AuthController@index");

