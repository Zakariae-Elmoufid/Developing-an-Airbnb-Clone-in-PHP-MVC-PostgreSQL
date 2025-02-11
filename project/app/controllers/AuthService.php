<?php

namespace App\controllers;

use App\classes\Users;
use App\core\Session;

class AuthService {
    private $user;
    
    public function __construct(Users $user) {
        $this->user = $user;
    }
    
    public function register(array $data): bool {
        // Check if email or username already exists
        if ($this->user->findByEmail($data['email'])) {
            throw new \Exception('Email already registered');
        }
        
        if ($this->user->findByUsername($data['username'])) {
            throw new \Exception('Username already taken');
        }
        
        return $this->user->create(
            $data['username'],
            $data['email'],
            $data['phone'],
            $data['password']
        );
    }
    
    public function login(array $credentials): bool {
        $user = $this->user->findByEmail($credentials['email']);
        
        if (!$user || !password_verify($credentials['password'], $user['password'])) {
            throw new \Exception('Invalid credentials');
        }
        
        $this->setUserSession($user);
        
        if (isset($credentials['remember_me'])) {
            $this->handleRememberMe($user['id']);
        }
        
        return true;
    }
    
    private function setUserSession(array $user): void {
        Session::set('user_id', $user['id']);
        Session::set('username', $user['username']);
    }
    
    private function handleRememberMe(int $userId): void {
        $token = bin2hex(random_bytes(32));
        setcookie('remember_token', $token, time() + (86400 * 30), '/');
        // Store token in database
    }
}