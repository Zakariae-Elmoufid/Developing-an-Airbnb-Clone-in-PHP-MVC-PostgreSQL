<?php 
namespace App\controllers;

use App\core\Controller;
use App\config\Database;


class CategoriesController extends Controller{

  public function index(){
    $this->view('admin/categories'); 
  }
  public function addCategories(){
    $data = json_decode(file_get_contents("php://input"), true);

    print_r(  $data );
    // $this->view('admin/categories'); 
  }






}