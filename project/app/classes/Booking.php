<?php 


namespace App\classes;


class Booking {
    
    private $id;
    private $inDate;
    private $outDate;
    private $numberOfGuests;
    private $totalPrice;
    private $status;
    
    public function __construct($inDate,$outDate,$status,$id=null, $numberOfGuests=null,$totalPrice=null){
         $this->id = $id;
         $this->inDate = $inDate;
         $this->outDate = $outDate;

         $this->numberOfGuests = $numberOfGuest;
         $this->totalPrice = $totalPrice;
    


         $this->numberOfGuests = $numberOfGuests;
         $this->totalPrice = $totalPrice;
         $this->status = $status;
    }
}
