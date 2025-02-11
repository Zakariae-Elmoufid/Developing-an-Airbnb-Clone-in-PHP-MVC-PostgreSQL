<?php
namespace App\controllers;


use App\core\Controller;

class AuthController extends Controller
{
    public function index(){
        $this->view('register'); 
      }
}