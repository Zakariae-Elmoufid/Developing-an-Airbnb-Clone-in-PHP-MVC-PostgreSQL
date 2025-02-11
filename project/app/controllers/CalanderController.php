<!-- <?php
// namespace App\controllers;
// header('Content-Type: application/json');
// require __DIR__ . "/../../vendor/autoload.php";

// use App\core\Controller;
// use App\models\BookingModel;

// class CalanderController extends Controller {
    
//     public $role  = "Traveler";

//     // public function show(){
//         // $this->view($this->role.'/addBooking'); 
//     // }

//     public function fechCalander(){
//         // $this->view($this->role.'/addBooking'); 
//         $bookingModel = new BookingModel();
//         $reservations = $bookingModel->getReservedDates();
     
//         $reservedDates = [];

//     foreach ($reservations as $res) {
//         $start = new DateTime($res['checkindate']);
//         $end = new DateTime($res['checkoutdate']);
//         while ($start <= $end) {
//             $reservedDates[] = $start->format('Y-m-d'); // Ajouter chaque date à la liste
//             $start->modify('+1 day');
//         }
//     }

//     echo json_encode($reservedDates); // Envoyer le JSON
//     }
    
    
// }
