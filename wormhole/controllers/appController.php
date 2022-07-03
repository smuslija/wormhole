<?php

class AppController{

    public function showTemplate(){
        require('./views/template.php');
    }

    public function showView(){
        
        if(isset($_GET['action'])){
            $target = $_GET['action'];
        }else{
            $target = 'index';
        }

        $response = routesController::returnUrl($target);
        require($response);
    }
}