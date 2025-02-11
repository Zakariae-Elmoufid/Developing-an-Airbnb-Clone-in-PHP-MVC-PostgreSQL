<?php 



use App\core\Router; 
Router::add("GET","/","HomeController@index");
Router::add("GET", "makeBooking","BookingController@show");
Router::add('GET','makeBooking/test', 'BookingController@fechCalander');
// Router::add('GET','Booking', 'CalanderController@fechCalander');
