<?php


namespace App\classes\Booking;

use App\config\Database;
use PDO;

class Users {
    private $db;
    
    public function __construct() {
        $this->db = Database::getConnection();
    }
    
    public function create($username, $email, $phone, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([$username, $email, $phone, $hashedPassword]);
    }
    
    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function findByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}