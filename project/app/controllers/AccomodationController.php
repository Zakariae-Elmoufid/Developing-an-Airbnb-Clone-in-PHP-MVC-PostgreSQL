<?php  
namespace App\controllers;

use App\core\Controller;
use App\config\Database;
use App\models\Accommodation;


class AccomodationController extends Controller{
    private $accommodation;
   public function __construct(){
      $this->accommodation= new Accommodation();
   }

  public function index(){
    $this->view('admin/accommodation'); 
  }
  public function accomondationNotValide(){
    $data=$this->accommodation->getAccommodationNotValide();
    print_r(json_encode($data));
  }
  public function publicAccommodation(){
    $data = json_decode(file_get_contents("php://input"), true);
    $this->accommodation->setId($data);
    if ( $this->accommodation->publicAccommodation()) {
      echo(json_encode($data));
    }
    
  }
}