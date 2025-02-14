<?php 

use App\core\Router; 

Router::add("GET","/","HomeController@index");

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


