<?php

namespace App\controllers;
require __DIR__ . "/../../vendor/autoload.php";
use App\core\Controller;
use App\models\ReveiwModel;
use App\core\Validator;
use App\core\Session;
use App\classes\Review;
// Session::start();



class ReviewController extends Controller {
    private $role  = "Traveler";
    private $ReviewModel;
    private $table = "review";
    
    public function __construct(){
        $this->ReviewModel = new ReveiwModel();
    }


    public function insetReview(){
       
       $rating =  $_POST['rating'];
       $comment =  $_POST['comment'];
       $booking_id = $_POST['booking_id'];

       if(!Validator::comment($comment)){
           Session::setFlash('comment',"The comment must be between 50 and 500 characters.");
           Session::setFlash('comment_value',$comment);
       }
       if(!Validator::review($rating)){
        Session::setFlash('rating',"Rating must be between 1 and 5.");
       }

         
       if (Validator::comment($comment) && Validator::review($rating)) {
          $this->ReviewModel->insert($this->table,['rating' => $rating , 'comment' => $comment , 'booking_id' => $booking_id ]); 
          Session::setFlash('success', "Review submitted successfully.");
          header("Location: myBooking");
          exit;
        }else {
            header("Location: nn");
          exit;
        }


    }


    public function getReviewbyId(){
      
       return $data;
    }


}

