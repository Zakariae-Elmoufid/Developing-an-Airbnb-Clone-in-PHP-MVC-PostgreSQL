<?php 
namespace App\controllers;

use App\core\Controller;
use App\config\Database;
use App\models\Categorie;


class CategoriesController extends Controller{
    private $categorie;
   public function __construct(){
      $this->categorie= new Categorie();
   }

  public function index(){
    $this->view('admin/categories'); 
  }

  public function addCategories() {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data["title"])) {
        $this->categorie->setTitle($data["title"]);
        if ($this->categorie->addCategorie()) {

            print_r(json_encode([
                "icon" => "success",
                "title" => "Category added successfully"
            ]));
        } else {
            print_r(json_encode([
                "icon" => "error",
                "title" => "Failed to add category"
            ]));
        }
    } else {
        print_r(json_encode([
            "icon" => "error",
            "title" => "Title is required"
        ]));
    }
}

public function allCategories(){
    print_r(json_encode($this->categorie->getAllCategories()));
}
public function getCategorieById(){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $this->categorie->setId($id);
        print_r(json_encode($this->categorie->getCategorieById()));
    }
}
 public function updateCategories(){
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data["title"])) {
        $this->categorie->setTitle($data["title"]);
        $this->categorie->setId($data["id"]);
        if ($this->categorie->updateCategorie()) {

            print_r(json_encode([
                "icon" => "success",
                "title" => "Category update successfully"
            ]));
        } else {
            print_r(json_encode([
                "icon" => "error",
                "title" => "Failed to update category"
            ]));
        }
    } else {
        print_r(json_encode([
            "icon" => "error",
            "title" => "Title is required"
        ]));
    }
}

public function deleteCategorie(){
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data)) {
        $this->categorie->setId($data);
        if ($this->categorie->deleteCategorie()) {

            print_r(json_encode([
                "icon" => "success",
                "title" => "Category delete successfully"
            ]));
        } else {
            print_r(json_encode([
                "icon" => "error",
                "title" => "Failed to delete category"
            ]));
        }
    } else {
        print_r(json_encode([
            "icon" => "error",
            "title" => "Id is required"
        ]));
    }
}

}