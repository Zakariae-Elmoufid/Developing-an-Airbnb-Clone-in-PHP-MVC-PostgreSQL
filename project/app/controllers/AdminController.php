<?php 
namespace App\controllers;

use App\core\Controller;
use App\config\Database;


class AdminController extends Controller{

  public function index(){
    $this->view('admin/index'); 

  }


}