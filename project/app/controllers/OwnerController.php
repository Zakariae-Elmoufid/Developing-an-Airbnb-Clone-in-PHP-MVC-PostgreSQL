<?php 
namespace App\controllers;

use App\core\Controller;
use App\core\Model;


class OwnerController extends Controller{


  public function dashboardCategories(){
    $model = new Model(); 
    $categories = $model->findAll("Category");
    $this->view('dashboard'); 
    return $categories;
}
  public function dashboardAnnonce(){
    $this->view('dashboard'); 
  }

  public function allUsers($table) {
    return users($table);
  }
}