<?php
namespace App\classes;
class Accommodation {
    private $id;
    private $userId;
    private $title;
    private $description;
    private $categoryId;
    private $address;
    private $baseprice;    
    private $maxguests;   
    private $photos;
    private $status;
    private $isvalidated;
    
    public function __construct($userId, $title, $description, $categoryId, $address, $baseprice, $maxguests, $photos) {
        $this->userId = $userId;
        $this->title = $title;
        $this->description = $description;
        $this->categoryId = $categoryId;
        $this->address = $address;
        $this->baseprice = $baseprice;  
        $this->maxguests = $maxguests; 
        $this->photos = $photos;
        $this->status = 'available';
        $this->isvalidated = 'true';  
    }
    public function getId() { return $this->id; }
    public function getUserId() { return $this->userId; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getCategoryId() { return $this->categoryId; }
    public function getAddress() { return $this->address; }
    public function getBasePrice() { return $this->baseprice; }
    public function getMaxGuests() { return $this->maxguests; }
    public function getPhotos() { return $this->photos; }
    public function getStatus() { return $this->status; }
    public function getIsValidated() { return $this->isvalidated; }
    
    public function setTitle($title) { $this->title = $title; }
    public function setDescription($description) { $this->description = $description; }
    public function setAddress($address) { $this->address = $address; }
    public function setBasePrice($basePrice) { $this->baseprice = $basePrice; }
    public function setMaxGuests($maxGuests) { $this->maxguests = $maxguests; }
    public function setPhotos($photos) { $this->photos = $photos; }
    public function setStatus($status) { $this->status = $status; }
    public function setIsValidated($isValidated) { $this->isvalidated = $isvalidated; }
    
    public function toArray() {
        return [
            'user_id' => $this->userId,
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->categoryId,
            'address' => $this->address,
            'baseprice' => $this->baseprice,
            'maxguests' => $this->maxguests,
            'photos' => json_encode($this->photos),
            'status' => $this->status,
            'isvalidated' => $this->isvalidated
        ];
    }
}