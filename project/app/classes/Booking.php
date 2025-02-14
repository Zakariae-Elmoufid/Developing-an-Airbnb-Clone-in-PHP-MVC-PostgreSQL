<?php 

<<<<<<< HEAD
namespace App\classes\Booking;
=======
namespace App\classes;
>>>>>>> khaoula

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
<<<<<<< HEAD
         $this->numberOfGuests = $numberOfGuest;
         $this->totalPrice = $totalPrice;
    }

=======
         $this->numberOfGuests = $numberOfGuests;
         $this->totalPrice = $totalPrice;
    }
    
>>>>>>> khaoula
}


