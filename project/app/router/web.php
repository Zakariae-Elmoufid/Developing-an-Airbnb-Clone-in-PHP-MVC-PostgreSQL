<?php 



use App\core\Router; 
Router::add("GET","/","HomeController@index");
Router::add("GET","/admin","AdminController@index");
Router::add("GET","/categories","AdminController@categories");
Router::add("GET","/accommodation","AdminController@accommodation");
Router::add("GET","/conflits","AdminController@conflits");
Router::add("GET","/avis","AdminController@avis");
