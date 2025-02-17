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
        
        return [
            'categories' => $categories,
            'accommodations' => $accommodations ];

       
     var_dump($accommodations[0]);
        
        return $categories;

    }

    public function create() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $requiredFields = ['title', 'description', 'category_id', 'address', 'baseprice', 'guests'];
                foreach ($requiredFields as $field) {
                    if (!isset($_POST[$field]) || empty($_POST[$field])) {
                        throw new \Exception("Le champ $field est requis");
                    }
                }
                $photos = [];
                if (!empty($_FILES['photos']['name'][0])) {
                    $uploadDir = __DIR__ . "/../../public/uploads/";
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
                        $file_name = uniqid() . '_' . basename($_FILES['photos']['name'][$key]);
                        $file_path = $uploadDir . $file_name;
                        
                        if (move_uploaded_file($tmp_name, $file_path)) {
                            $photos[] = $file_name;
                        }
                    }
                }
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