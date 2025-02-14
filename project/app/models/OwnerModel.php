<?php

namespace App\models;

use App\core\Model;
use App\classes\Accommodation;
use PDO;

class OwnerModel extends Model {
    
    public function create(Accommodation $accommodation) {
        try {
            $data = $accommodation->toArray();
            return  $this->insert('accommodation', $data);
        } catch (\Exception $e) {
            throw new \Exception("Error creating accommodation: " . $e->getMessage());
        }
    }

           
}