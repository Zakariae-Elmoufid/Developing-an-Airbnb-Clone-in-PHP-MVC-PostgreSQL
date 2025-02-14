<?php

namespace App\Classes ;

class User {
    private $id;
    private $username;
    private $password;
    private $email;
    private $profilepicture;
    private $status;
    private $phone;
    private Role $role_id;

    public function __construct($id, $username, $password, $email, $profilepicture, $status, $phone, Role $role_id) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->profilepicture = $profilepicture;
        $this->status = $status;
        $this->phone = $phone;
        $this->role_id = $role_id;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'password' => $this->password,
            'email' => $this->email,
            'profile_picture' => $this->profilepicture,
            'status' => $this->status,
            'phone' => $this->phone,
            'role' => $this->role_id->toArray() // Utilisation de toArray() de Role
        ];
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getProfilePicture() {
        return $this->profilepicture;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getRoleId() {
        return $this->role_id;
    } 
}

