<?php
namespace App\controllers;

use App\core\Controller;
use App\models\BookingModel;
use \Datetime;


class BookingController extends Controller {
    
    public $role  = "Traveler";

    public function show(){
        $this->view($this->role.'/addBooking'); 
    }

    public function fechCalander(){
     header('Content-Type: application/json');
        $bookingModel = new BookingModel();
        $reservations = $bookingModel->getReservedDates();
     
        $reservedDates = [];

    foreach ($reservations as $res) {
        $start = new DateTime($res['checkindate']);
        $end = new DateTime($res['checkoutdate']);
        while ($start <= $end) {
            $reservedDates[] = $start->format('Y-m-d'); 
            $start->modify('+1 day');
        }
    }

    echo json_encode([$reservedDates]);
    exit;
    }
    
    
}
