<?php 

namespace App\models;
use App\core\Model;

class Categorie extends Model {
    private $id;
    private $title;
    private $table;

    public function __construct(){
        $this->table="Category";
    } 

    public function setId($id){$this->id=$id;}
    public function setTitle($title){$this->title=$title;}
    public function addCategorie(){
        $this->insert($this->table,["titel"=>$this->title]);
    }
     
}