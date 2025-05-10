<?php 

namespace App\classes;

class Review {

   private Booking $bookingId;
   private ?int $id;
   private int $booking_id;
   private ?int $rating;
   private string $comment;
   private ?string $createdat;
   private ?string $status;
   

   public function __construct(
    $booking_id, 
    $id = null, 
    $rating = null, 
    $comment = '', 
    $createdat = null, 
    $status = null
) {
    $this->booking_id = $booking_id;
    $this->id = $id;
    $this->rating = $rating;
    $this->comment = $comment;
    $this->createdat = $createdat;
    $this->status = $status;
}


public function toArray() {
    return [
        'booking_id' => $this->booking_id,
        'id' => $this->id,
        'rating' => $this->rating,
        'comment' => $this->comment,
        'createdat' => $this->createdat,
        'status' => $this->status
    ];
}
   
   




}
    