<?php
namespace App\models;

use App\core\Model;
use App\classes\Accommodation;
use App\config\Database;
use PDO;

class OwnerModel extends Model {
    protected $db;

    public function __construct() {
        parent::__construct();
        $this->db = Database::getConnection();
    }

    public function create(Accommodation $accommodation) {
        try {
            $data = $accommodation->toArray();
            return $this->insert('accommodation', $data);
        } catch (\Exception $e) {
            throw new \Exception("Error creating accommodation: " . $e->getMessage());
        }
    }
    
    

    public function getValidatedAccommodations() {
        try {
            $sql = "SELECT a.*, c.title as category_name 
                    FROM accommodation a 
                    LEFT JOIN category c ON a.category_id = c.id 
                    WHERE a.isvalidated = 'true'";
            
            $stmt = $this->db->query($sql);
            $accommodations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($accommodations as &$accommodation) {
                if (isset($accommodation['photos'])) {
                    $accommodation['photos'] = /* `json_decode` is a PHP function that is used to
                    decode a JSON string and convert it into a PHP
                    variable. In the provided code, `json_decode` is used
                    to decode the JSON string stored in the `photos`
                    column of the `accommodation` table into an
                    associative array. If the `photos` column contains
                    valid JSON data, `json_decode` will return an
                    associative array representation of that data. If the
                    `photos` column is empty or not valid JSON,
                    `json_decode` will return an empty array. */
                    json_decode($accommodation['photos'], true) ?? [];
                } else {
                    $accommodation['photos'] = [];
                }
            }
            
            return $accommodations;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching accommodations with photos: " . $e->getMessage());
        }
    }

    public function getAllAccommodationsByUserId($userId) {
        try {
            $sql = "SELECT a.*, c.title as category_name 
                    FROM accommodation a 
                    LEFT JOIN category c ON a.category_id = c.id 
                    WHERE a.user_id = ?";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$userId]);
            
            $accommodations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // foreach ($accommodations as &$accommodation) {
            //     if (isset($accommodation['photos'])) {
            //         $accommodation['photos'] = json_decode($accommodation['photos'], true) ?? [];
            //     } else {
            //         $accommodation['photos'] = [];
            //     }
            // }
            
            return $accommodations;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching accommodations: " . $e->getMessage());
        }
    }
}