<?php 

namespace App\models;
require __DIR__ . "/../../vendor/autoload.php";
// use App\classes\Booking;
use App\core\Model;
use PDO;
use Exception;
use PDOException;

class BookingModel extends Model{

    public function getBookingDates(){
       
    }

    public function getReservedDates() {
        $stmt = $this->query("SELECT checkInDate, checkOutDate FROM Booking WHERE status = 'active' and id = 3");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
  
    }
   
}
