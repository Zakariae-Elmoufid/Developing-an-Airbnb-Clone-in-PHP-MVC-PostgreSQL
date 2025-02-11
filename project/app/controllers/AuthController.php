<?php
namespace App\controllers;


use App\core\Controller;

class AuthController extends Controller
{
    public function register(){
        $this->view('register'); 
      }
      public function login(){
        $this->view('login'); 
      }




      
}