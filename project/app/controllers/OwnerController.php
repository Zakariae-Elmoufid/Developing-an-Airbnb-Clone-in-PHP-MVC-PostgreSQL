<?php 
namespace App\controllers;
require __DIR__. '/../../vendor/autoload.php'; 

use App\core\Model;
use App\core\Controller;
use App\models\OwnerModel;
use App\classes\Accommodation;
use App\core\Session;

class OwnerController extends Controller {
    private $accommodationModel;
    
    private $staticUserId = 1; 

    public function __construct() {
       
        
        $this->accommodationModel = new OwnerModel();
    }

    public function dashboardCategories(){
        $model = new Model(); 
        $categories = $model->findAll("Category");
        $this->view('dashboard'); 
        return $categories;
    }

    public function create() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $photos = [];

                if (isset($_FILES['photos'])) {
                    foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
                        $filename = uniqid() . '_' . $_FILES['photos']['name'][$key];
                        $uploadPath = __DIR__ . '/../../public/uploads/' . $filename;
                        
                        if (move_uploaded_file($tmp_name, $uploadPath)) {
                            $photos[] = $filename;
                        }
                    }
                }
                 
                $accommodation = new Accommodation(
                    $this->staticUserId, 
                    $_POST['title'],
                    $_POST['description'],
                    $_POST['category_id'],
                    $_POST['address'],
                   $_POST['price'],
                    $_POST['guests'],
                    $photos,

                );

               // print_r($accommodation);
              //  exit();
                
                $id = $this->accommodationModel->create($accommodation);
                
                if ($id) {
                    Session::setFlash('success', 'Hébergement créé avec succès!');
                    header('Location: /dashboard');
                    exit;
                } else {
                    Session::setFlash('error', 'Erreur lors de la création de l\'hébergement.');
                    header('Location: /dashboard');
                    exit;
                }
            }
        } catch (\Exception $e) {
            Session::setFlash('error', $e->getMessage());
            header('Location: /dashboard');
            exit;
        }
    }
}