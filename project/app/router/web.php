<?php 



use App\core\Router; 
Router::add("GET","/","HomeController@index");
Router::add("GET", "makeBooking","BookingController@getAccommodationById");
Router::add('GET','makeBooking/test', 'BookingController@fechCalander');
Router::add('POST','make', 'BookingController@addBooking');

// Router::add('GET','Booking', 'CalanderController@fechCalander');
