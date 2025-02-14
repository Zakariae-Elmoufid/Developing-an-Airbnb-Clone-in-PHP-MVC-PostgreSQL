<?php
namespace App\controllers;

use App\core\Controller;

class accommodationController extends Controller {
    private $role  = "Traveler";

    public function show(){
        $this->view($this->role.'/accommodation'); 
    }
}