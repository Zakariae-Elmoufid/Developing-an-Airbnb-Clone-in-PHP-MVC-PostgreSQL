<?php 
namespace App\controllers;

use App\core\Controller;
use App\models\OwnerModel;


class HomeController extends Controller{

  // public function index(){
  //   $this->view('Home'); 
  // }


      public function index() {
         
          $ownerModel = new OwnerModel();
          
          $accommodations = $ownerModel->getValidatedAccommodations();
         
          $data = ['accommodations' => $accommodations];
          
          $this->view('Home', $data);
      }
  }
