<?php


function checkRequestMethod($method){
    if($_SERVER['REQUEST_METHOD']==$method){
        return true ;
    }else{
        return false ;
    }

}

function checkPostinput($input){
    if(isset($_POST[$input])){
        return true ;
    }else{
        return false ;
    }
}


function sanitizeInput($input) {
    if (is_array($input)) {
        foreach ($input as $key => $value) {
            $input[$key] = sanitizeInput($value);
        }
    } else {
        $input = trim(htmlspecialchars($input));
    }
    
    return $input;
}


 function redirect($path){
    header("location:$path") ;
 }



 
   
 
 function requiredVal($input) {
     if(empty($input)){
         return true ;
     }else{
         return false ;
     }
 }
 
 
 function minVal($input,$length){
     if(strlen($input)<$length){
         return true ;
     }else{
         return false ;
     }
 
 }
 
 function maxVal($input,$length){
     if(strlen($input)>$length){
         return true ;
     }else{
         return false ;
     }
 
 }
 
 
 function emailVal($email){
    if (filter_var($email,FILTER_VALIDATE_EMAIL)){
     return true ;
    }else{
     return false ;
    }
 
 
 }
 
  
  