<?php 

namespace App\models;
use App\core\Model;
use App\config\Database;

class Categorie extends Model {
    private $id;
    private $title;
    private $table;
    private $conect;

    public function __construct(){
        $this->table="Category";
        $this->conect= Database::getConnection();
    } 

    public function setId($id){$this->id=$id;}
    public function setTitle($title){$this->title=$title;}
    public function addCategorie() {
        $sql = "INSERT INTO " . $this->table . " (title) VALUES (?);";
        $stmt = $this->conect->prepare($sql); 
        $stmt->execute([$this->title]); 
        return $this->conect->lastInsertId();
    }
    
     
}