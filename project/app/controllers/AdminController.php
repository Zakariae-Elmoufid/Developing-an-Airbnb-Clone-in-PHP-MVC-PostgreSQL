<?php 
namespace App\controllers;

use App\core\Controller;
use App\config\Database;


class AdminController extends Controller{

  public function index(){
    $this->view('admin/index'); 
  }
  public function categories(){
    $this->view('admin/categories'); 
  }
  public function accommodation(){
    $this->view('admin/accommodation'); 
  }
  public function conflits(){
    $this->view('admin/conflits'); 
  }
  public function avis(){
    $this->view('admin/avis'); 
  }


}