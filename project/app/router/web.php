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

Router::add("GET", "makeBooking","BookingController@getAccommodationById");
Router::add('GET','makeBooking/test', 'BookingController@fechCalander');
Router::add('POST','/make', 'BookingController@addBooking');
Router::add('GET','myBooking', 'BookingController@myBooking');
Router::add('POST','/myBooking','ReviewController@insetReview');
Router::add('GET','success','PaymentsController@successPage');
Router::add('GET','accommodation','accommodationController@show');





































Router::add("GET","/dashboard","OwnerController@dashboardCategories");
Router::add("POST","/dashboard/create", "OwnerController@create");
Router::add("GET","/register","AuthController@registerview");
Router::add('POST', '/register', 'AuthController@register');
Router::add('POST', '/login', 'AuthController@login');
Router::add("GET","/login","AuthController@loginView");

Router::add("GET","acco","AuthController@loginView");


Router::add("GET","/google-login","AuthController@googleLoginView");
Router::add("GET","/google-callback","AuthController@googleCallback");


Router::add("GET","/select_role","AuthController@googleCallback");

Router::add("GET", "/select-role", "AuthController@selectRoleView");
Router::add("POST", "/select-role", "AuthController@selectRole");

