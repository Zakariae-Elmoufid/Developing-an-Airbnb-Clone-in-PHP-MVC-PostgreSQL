<?php

namespace App\requests;




class RegisterRequest {
    private $data;
    private $errors = [];
    
    public function __construct(array $data) {
        $this->data = $data;
    }
    
    public function validate(): bool {
        // Username validation
        if (empty($this->data['username'])) {
            $this->errors['username'] = 'Username is required';
        } elseif (!preg_match("/^[a-zA-Z0-9_\s]{3,20}$/", $this->data['username'])) {
            $this->errors['username'] = 'Username must be 3-20 characters and contain only letters, numbers and underscores';
        }
        
        // Email validation
        if (empty($this->data['email'])) {
            $this->errors['email'] = 'Email is required';
        } elseif (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format';
        }
        
        // Phone validation
        if (empty($this->data['phone'])) {
            $this->errors['phone'] = 'Phone number is required';
        }
        
        // Password validation
        if (empty($this->data['password'])) {
            $this->errors['password'] = 'Password is required';
        } elseif (strlen($this->data['password']) < 8) {
            $this->errors['password'] = 'Password must be at least 8 characters';
        } elseif ($this->data['password'] !== $this->data['password_confirmation']) {
            $this->errors['password'] = 'Passwords do not match';
        }
        
        return empty($this->errors);
    }
    
    public function getErrors(): array {
        return $this->errors;
    }
    
    public function getData(): array {
        return $this->data;
    }
}
