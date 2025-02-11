<?php 
namespace App\controllers;

use App\core\Controller;


class AdminController extends Controller{

  public function index(){
    $this->view('admin/index'); 
  }


}