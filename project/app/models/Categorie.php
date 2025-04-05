<?php 

namespace App\models;
use App\core\Model;
use App\config\Database;
use PDO;

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

    public function getAllCategories(){
        $sql = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
        $stmt = $this->conect->prepare($sql); 
        $stmt->execute(); 
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function getCategorieById(){
        $sql="SELECT * from ". $this->table ." WHERE id=? ;" ;
        $stmt = $this->conect->prepare($sql); 
        $stmt->execute([$this->id]); 
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
     public function updateCategorie(){
        $sql="UPDATE $this->table set title= ? where id=?";
        $stmt = $this->conect->prepare($sql); 
        $stmt->execute([$this->title,$this->id]);
        return true ;
     }
     public function deleteCategorie(){
        $sql="DELETE from $this->table where id=? ";
        $stmt=$this->conect->prepare($sql); 
        $stmt->execute([$this->id]);
        return true ;
     }
}