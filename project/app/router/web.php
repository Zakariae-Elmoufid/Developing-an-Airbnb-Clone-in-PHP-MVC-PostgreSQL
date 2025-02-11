<?php 



use App\core\Router; 
Router::add("GET","/","HomeController@index");
Router::add("GET","/register","AuthController@registerview");
Router::add('POST', '/register', 'AuthController@register');
Router::add("GET","/login","AuthController@loginView");


