<?php

namespace App\Classes ;

class Role {
  
    private $role_id;

    public function __construct($role_id){
       $this->role_id = $role_id;
    }

    public function getRole_id() {
        return $this->role_id;
    }

    public function toArray() {
        return [
            'role_id' => $this->role_id
        ];
        }
}    