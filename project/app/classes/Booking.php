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
         $this->numberOfGuests = $numberOfGuests;
         $this->totalPrice = $totalPrice;
         $this->status = $status;
    }


    public function toArray() {
        return [
            'id' => $this->id,
            'in_date' => $this->inDate,
            'out_date' => $this->outDate,
            'number_of_guests' => $this->numberOfGuests,
            'total_price' => $this->totalPrice,
            'booking_status' => $this->status
        ];
    }
    
    
}


