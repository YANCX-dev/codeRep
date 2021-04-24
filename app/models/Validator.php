<?php


namespace App\models;
session_start();

class Validator
{
    //Предварительная обработка введенного текста
    public static function preProccessing($data){
        return htmlspecialchars(trim($data));
    }

    public static function validLength($name,$data,$field,$minLength = 3,$maxLength = 50){

        if(mb_strlen($data)<$minLength){
            $_SESSION["errors"][$field] = "В поле \"$name\" должно быть не менее $minLength символов.\n";

            return false;
        }
        if(strlen($data) > $maxLength){
            $_SESSION["errors"][$field] = "В поле \"$name\" должно быть не более $maxLength символов.\n";

            return false;
        }
        unset($_SESSION["errors"][$field]);
        return true;

    }
//    public static function validEmail($name,$data,$field){
//
//        if(!filter_var($data,FILTER_VALIDATE_EMAIL)){
//            $_SESSION["errors"][$field] = "В поле \"$name\" должн быть указан Email.\n";
//        }
//    }

}