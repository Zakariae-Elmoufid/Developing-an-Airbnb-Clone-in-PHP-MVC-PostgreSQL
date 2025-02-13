<?php 



use App\core\Router; 
Router::add("GET","/","HomeController@index");
Router::add("GET","/register","AuthController@registerview");
Router::add('POST', '/register', 'AuthController@register');
Router::add('POST', '/login', 'AuthController@login');
Router::add("GET","/login","AuthController@loginView");


Router::add("GET","/google-login","AuthController@googleLoginView");
Router::add("GET","/google-callback","AuthController@googleCallback");


Router::add("GET","/select_role","AuthController@googleCallback");

Router::add("GET", "/select-role", "AuthController@selectRoleView");
Router::add("POST", "/select-role", "AuthController@selectRole");



