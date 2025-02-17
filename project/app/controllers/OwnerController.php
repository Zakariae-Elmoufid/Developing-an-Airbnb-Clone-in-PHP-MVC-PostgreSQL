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

    public function dashboardCategories() {
        $model = new Model(); 
        $categories = $model->findAll("Category");
        $accommodations = $this->accommodationModel->getAllAccommodationsByUserId($this->staticUserId);
        
        $this->view('dashboard', [
            'categories' => $categories,
            'accommodations' => $accommodations
        ]); 
        
        return $categories;
    }

    public function create() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $photos = isset($_FILES['photos']) ? $_FILES['photos'] : []; 
    
                $accommodation = new Accommodation(
                    $this->staticUserId, 
                    $_POST['title'],
                    $_POST['description'],
                    $_POST['category_id'],
                    $_POST['address'],
                    floatval($_POST['baseprice']), 
                    intval($_POST['guests']),
                    $photos
                );
    
                $id = $this->accommodationModel->create($accommodation);
                   
                if ($id) {
                    Session::setFlash('success', 'Hébergement créé avec succès!');
                    header('Location: /dashboard');  
                    exit;
                } else {
                    throw new \Exception("Erreur lors de la création de l'hébergement");
                }
            }
        } catch (\Exception $e) {
            Session::setFlash('error', $e->getMessage());
            header('Location: /dashboard');
            exit;
        }
    }
    
    
}