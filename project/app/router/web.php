<?php 



use App\core\Router; 
Router::add("GET","/","HomeController@index");
Router::add("GET","/admin","AdminController@index");
Router::add("GET","/categories","CategoriesController@index");
Router::add("GET","/allCategories","CategoriesController@allCategories");
Router::add("GET","/getCategorieById","CategoriesController@getCategorieById");
Router::add("POST","/categories","CategoriesController@addCategories");
Router::add("PATCH","/categories","CategoriesController@updateCategories");
Router::add("DELETE","/categories","CategoriesController@deleteCategorie");
Router::add("GET","/accommodation","AccomodationController@index");
Router::add("GET","/getAllAccommodation","AccomodationController@accomondationNotValide");
Router::add("PATCH","/accommodation","AccomodationController@publicAccommodation");
Router::add("GET","/conflits","AdminController@conflits");
Router::add("GET","/avis","AdminController@avis");
