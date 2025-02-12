<?php 

namespace App\models;
require __DIR__ . "/../../vendor/autoload.php";
// use App\classes\Booking;
use App\core\Model;
use PDO;
use Exception;
use PDOException;
use App\models\BookingModel;

class BookingModel extends Model{

    public function findAccommodationById($table,$idAccommodation){
        $stmt = $this->query("SELECT * FROM $table
        INNER JOIN users ON accommodation.user_id = users.id
        WHERE accommodation.isvalidated = 'true' and accommodation.id = ?",[$idAccommodation]);
        return $stmt->fetch(PDO::FETCH_ASSOC);  
    }

    public function getReservedDates() {
        $stmt = $this->query("SELECT checkInDate, checkOutDate FROM Booking WHERE status = 'active' and id = 3");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
   
}
