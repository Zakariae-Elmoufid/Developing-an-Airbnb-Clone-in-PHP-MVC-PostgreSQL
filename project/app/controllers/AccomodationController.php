<?php  
namespace App\controllers;

use App\core\Controller;
use App\config\Database;
use App\models\Categorie;


class AccomodationController extends Controller{
    private $categorie;
//    public function __construct(){
//       $this->categorie= new Categorie();
//    }

  public function index(){
    $this->view('admin/accommodation'); 
  }
  public function accomondationNotValide(){
    
  }
}