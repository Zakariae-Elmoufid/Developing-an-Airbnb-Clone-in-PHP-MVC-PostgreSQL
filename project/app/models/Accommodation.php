<?php

namespace App\models;
use App\core\Model;
use App\config\Database;
use PDO;

class Accommodation extends Model {
 
    private $id;
    private $conect;
    public function __construct(){
            $this->conect= Database::getConnection();
    }
    public function setId($id){$this->id=$id;}

   public function getAccommodationNotValide(){
    $sql="SELECT accommodation.address,accommodation.baseprice,accommodation.description,accommodation.id,accommodation.maxguests,accommodation.baseprice,array_to_json(accommodation.photos),users.username,users.profilepicture,category.title
           FROM accommodation
            JOIN users ON users.id = accommodation.user_id
           JOIN category ON category.id = accommodation.category_id
           WHERE isvalidated = FALSE;";
          $stmt= $this->conect->prepare($sql);
          $stmt->execute(); 
          return $stmt->fetchAll(PDO::FETCH_OBJ);

        }


      public function publicAccommodation(){
        $sql="update accommodation set isvalidated = true where id=?";
        $stmt= $this->conect->prepare($sql);
          $stmt->execute([$this->id]); 
          return true;

      }




}