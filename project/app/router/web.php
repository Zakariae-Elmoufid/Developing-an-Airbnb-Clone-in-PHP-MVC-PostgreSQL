<?php 



use App\core\Router; 
Router::add("GET","/","HomeController@index");
Router::add("GET","/register","AuthController@register");
Router::add("GET","/login","AuthController@login");


