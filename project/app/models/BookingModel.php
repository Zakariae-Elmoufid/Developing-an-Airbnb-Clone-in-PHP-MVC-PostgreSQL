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

class BookingModel extends Model{

    public function findAccommodationById($table,$idAccommodation){
        $stmt = $this->query("SELECT * FROM $table
        INNER JOIN users ON accommodation.user_id = users.id
        WHERE accommodation.isvalidated = 'true' and accommodation.id = ?",[$idAccommodation]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $accommodation =   new Accommodation($data["user_id"], $data["title"], $data["description"], $data["category_id"], $data['address'], $data["baseprice"], $data["maxguests"], $data["photos"]);
        $role = new Role($data["role_id"]);
        $owner = new User($data["user_id"],$data["username"],$data['password'], $data['email'],$data["profilepicture"],$data["status"], $data['phone'], $role);
  
        return [
            'accommodation' =>  $accommodation->toArray(),
            'owner' => $owner->toArray()
        ];
        
    }

    public function getReservedDates() {
        $stmt = $this->query("SELECT checkInDate, checkOutDate FROM Booking WHERE status = 'active' and id = 3");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function getMybooking($table,$id){
        $stmt = $this->query("SELECT booking.id , booking.checkindate , booking.checkoutdate , booking.numberofguests ,  booking.totalprice , booking.status , 
     traveler.username as tarveler_username , traveler.email , traveler.status ,
	 accommodation.title ,  accommodation.description ,  accommodation.address ,  accommodation.baseprice ,  accommodation.maxguests, 
	 owner.username as owner_username ,owner.profilepicture ,review.rating, review.comment  FROM  booking 
        inner join users as traveler on traveler.id = booking.user_id 
		inner join  accommodation on accommodation.id = booking.accommodation_id
		inner join users as owner on owner.id = accommodation.user_id
        LEFT JOIN review ON review.booking_id = booking.id
        WHERE traveler.id = ?",[$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    
   
}
