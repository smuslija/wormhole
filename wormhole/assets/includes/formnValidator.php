<?php
 function notEmptyInputs($userData){
    $res;
    foreach($userData as $d){
        if (!empty($d)){
           $res =  true;
        }else{
           $res = false;
        }
    }
    return $res;
}