<?php

namespace App\models;
use App\core\Model;
use App\config\Database;
use PDO;

class Accommodation extends Model {
 
    private $conect;
    public function __construct(){
            $this->conect= Database::getConnection();
    }
   public function getAccommodationNotValide(){
    $sql="SELECT SELECT accommodation.address,accommodation.baseprice,accommodation.description,accommodation.id,accommodation.maxguests,accommodation.photos,users.username,category.title
           FROM accommodation
            JOIN users ON users.id = accommodation.user_id
           JOIN category ON category.id = accommodation.category_id
           WHERE isvalidated = FALSE;";
          $stmt= $this->conect->prepare($sql);
          $stmt->execute(); 
          return $stmt->fetchAll(PDO::FETCH_OBJ);

        }







}