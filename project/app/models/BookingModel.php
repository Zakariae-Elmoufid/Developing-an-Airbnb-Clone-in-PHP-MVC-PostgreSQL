<?php 

namespace App\models;
// require __DIR__ . "/../../vendor/autoload.php";
use App\core\Model;
use PDO;
use Exception;
use PDOException;
use App\models\BookingModel;
use App\classes\Booking;
use App\classes\Accommodation;
use App\classes\User;
use App\classes\Role;
use App\classes\Review;

class BookingModel extends Model{

    public function findAccommodationById($table,$idAccommodation){
        $stmt = $this->query("SELECT * FROM $table
        INNER JOIN users ON accommodation.user_id = users.id
        inner join category on category.id = accommodation.category_id
        WHERE accommodation.isvalidated = 'true' and accommodation.id = ?",[$idAccommodation]);
   
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            $results = [];
        
            foreach ($data as $row) {
                $accommodation = new Accommodation(
                    $row->user_id, 
                    $row->title, 
                    $row->description, 
                    $row->category_id, 
                    $row->address, 
                    $row->baseprice, 
                    $row->maxguests, 
                    $row->photos
                );
        
                $role = new Role($row->role_id);
        
                $owner = new User(
                    $role, 
                    $row->username, 
                    $row->user_id,
                    $row->email, 
                    $row->profilepicture, 
                    $row->status, 
                    $row->phone, 
                    $row->password
                );
        
                $results[] = [
                    'accommodation' => $accommodation->toArray(),
                    'owner' => $owner->toArray()
                ];
            }
        
            return $results;
        }

    public function getReservedDates() {
        $stmt = $this->query("SELECT checkInDate, checkOutDate FROM Booking WHERE status = 'active' and id = 3");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getMybooking($table, $id){
        $stmt = $this->query("SELECT 
            booking.id AS booking_id, 
            booking.checkindate, 
            booking.checkoutdate, 
            booking.numberofguests, 
            booking.totalprice, 
            booking.status AS booking_status, 
            accommodation.title,  
            accommodation.description,  
            accommodation.address,  
            accommodation.baseprice,  
            accommodation.maxguests, 
            accommodation.photos,
            owner.role_id,
            booking.user_id, 
            review.id as review_id,
            review.rating,
            review.comment, 
            review.status AS review_status, 
            review.createdat,
            owner.username AS owner_username,
            owner.profilepicture
        FROM booking 
        INNER JOIN accommodation ON accommodation.id = booking.accommodation_id
        INNER JOIN users AS owner ON owner.id = accommodation.user_id
        INNER JOIN category ON category.id = accommodation.category_id
        LEFT JOIN review ON review.booking_id = booking.id
        WHERE booking.user_id = ?", [$id]);
        
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        $bookings = [];
    
        // Groupe les réservations pour gérer plusieurs réservations
        $groupedData = [];
        foreach ($data as $row) {
            $bookingId = $row->booking_id;
            if (!isset($groupedData[$bookingId])) {
                $groupedData[$bookingId] = $row;
            }
        }
    
        foreach ($groupedData as $row) {
            $booking = new Booking(
                $row->checkindate, 
                $row->checkoutdate, 
                $row->booking_status, 
                $row->booking_id, 
                $row->numberofguests, 
                $row->totalprice
            );
            
            $role = new Role($row->role_id);
    
            $accommodation = new Accommodation(
                "", 
                $row->title, 
                $row->description, 
                "", 
                $row->address, 
                $row->baseprice, 
                $row->maxguests, 
                $row->photos
            );
    
            $user = new User(
                '',
                $row->owner_username, 
                '', 
                '', 
                $row->profilepicture, 
                '', 
                '',  
                $role
            );
    
            // Recherche de l'avis pour cette réservation
            $review = null;
            foreach ($data as $reviewRow) {
                if ($reviewRow->booking_id == $row->booking_id && $reviewRow->rating !== null) {
                    $review = new Review(
                        $reviewRow->booking_id, 
                        $reviewRow->review_id, 
                        $reviewRow->rating, 
                        $reviewRow->comment, 
                        $reviewRow->createdat, 
                        $reviewRow->review_status
                    );
                    break;
                }
            }
    
            $bookingEntry = [
                'booking' => $booking->toArray(),
                'accommodation' => $accommodation->toArray(),
                'owner' => $user->toArray(),
                'reviews' => $review ? $review->toArray() : null
            ];
    
            $bookings[] = $bookingEntry;
        }
        
        return $bookings;
    }

    // public function getReviewbyId($table, $id){
    //     $stmt = $this->query("SELECT  * FROM $table WHERE  booking_id = ?",[$id]);
    //     $data  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     $reviews = [];
    //     foreach ($data as $row) {
    //     $review  = new Review($row['booking_id'], $row['id'] , $row['rating'], $row['comment'], $row['createdat'], $row['status']);
    //     $reviews[] = $review->toArray();
    //     }
    //     return  $reviews;

    // }
    

    
   
}
