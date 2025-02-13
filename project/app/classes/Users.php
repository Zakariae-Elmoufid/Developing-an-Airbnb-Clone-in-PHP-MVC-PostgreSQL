<?php
namespace App\classes;

use App\config\Database;
use PDO;

class Users {
    private $db;
    
    public function __construct() {
        $this->db = Database::getConnection();
    }
    
    public function create($username, $email, $phone, $password, $role_id = 3) { // Default to Traveler (assuming 3 is Traveler)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (username, email, phone, password, role_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([$username, $email, $phone, $hashedPassword, $role_id]);
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

    // Add method to get available roles
    public function getRoles() {
        $sql = "SELECT * FROM role";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Add method to update user role
    public function updateRole($userId, $roleId) {
        $sql = "UPDATE users SET role_id = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$roleId, $userId]);
    }
    
}