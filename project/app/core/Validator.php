<?php 

namespace App\core;

class Validator{

    static $result;


    static function name($name){
        if(!preg_match(preg_match("/^[a-zA-Z0-9_\s]{3,20}$/",  $name))){
            self::$result=false;
        }
        else{
            self::$result=true;
        }
        return self::$result;
    }

    static function comment($comment){
        if(!preg_match('/^[\s\S]{50,500}$/', $comment)) {
            self::$result=false;
        }
        else{
            self::$result=true;
        }
        return self::$result;
    }
    
    
    static function review($review){
        if(!preg_match('/^[1-5]$/', $review)) {
            self::$result=false;
        }
        else{
            self::$result=true;
        }
        return self::$result;
    }
    
    
   
}