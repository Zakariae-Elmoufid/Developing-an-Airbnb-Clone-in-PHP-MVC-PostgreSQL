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

  public function addCategories(){
    // Database::getConnection();
    $data = json_decode(file_get_contents("php://input"), true);
    $this->categorie->setTitle($data["title"]);
    $this->categorie->addCategorie();
    print_r(  $data["title"] ); 
  }






}