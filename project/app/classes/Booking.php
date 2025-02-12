<?php 

namespace App\classes\Booking;

class Booking {
    
    private $id;
    private $inDate;
    private $outDate;
    private $numberOfGuests;
    private $totalPrice;
    
    public function __construct($id,$inDate,$outDate,$numberOfGuests,$totalPrice){
         $this->id = $id;
         $this->inDate = $inDate;
         $this->outDate = $outDate;
         $this->numberOfGuests = $numberOfGuest;
         $this->totalPrice = $totalPrice;
    }
    
}


