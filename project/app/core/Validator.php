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
   
}