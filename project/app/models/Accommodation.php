<?php

namespace App\models;
use App\core\Model;
use App\config\Database;
use PDO;

class Accommodation extends Model {
 
    private $conect;
    public function __construct(){
            $this->table="Category";
            $this->conect= Database::getConnection();
    }
   public function getAccommodationNotValide(){
    $sql="SELECT * 
          FROM accommodation
          JOIN users ON users.id = accommodation.user_id
          JOIN category ON category.id = accommodation.category_id
          WHERE isvalidated = FALSE;";
          $stmt= $this->conect->prepare($sql);
          $stmt->execute(); 
          return $stmt->fetchAll(PDO::FETCH_OBJ);

        }







}