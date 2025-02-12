<?php
namespace App\controllers;

use App\core\Controller;
use App\models\BookingModel;
use \Datetime;


class BookingController extends Controller {
    
    public $role  = "Traveler";
    public $bookingModel;
    
    public function __construct(){
        $this->bookingModel = new BookingModel();
    }

    public function show(){
        $this->view($this->role.'/addBooking'); 
    }


    public function getAccommodationById(){
         $data = $this->bookingModel->findAccommodationById('accommodation', 4); 
         $this->view($this->role.'/addBooking',$data); 
    }

    public function fechCalander(){
     header('Content-Type: application/json');
        $reservations = $this->bookingModel->getReservedDates();
     
        $reservedDates = [];

    foreach ($reservations as $res) {
        $start = new DateTime($res['checkindate']);
        $end = new DateTime($res['checkoutdate']);
        while ($start <= $end) {
            $reservedDates[] = $start->format('Y-m-d'); 
            $start->modify('+1 day');
        }
    }

    echo json_encode($reservedDates);
    exit;
    }

    public function addBooking(){
        header("Content-Type: application/json");

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dateStart = $_POST['checkIn'];
            $dateEnd  =  $_POST['checkOut'];
            $total =  $_POST['total'];
            
                echo json_encode([
                'data'=> $_POST
            ]);
            exit;
        }else{
            echo json_encode(['error' => false]);

        }

        $this->view(); 
    }
    
    
}
