<?php
require('C:/xampp/htdocs/wormhole/wormhole/assets/includes/formnValidator.php');
class UsersController{

    public function loginUserController(){
        
        if(isset($_POST['login-submit'])){
            $userData = array(
                'email' => $_POST['login-email'],
                'password' => $_POST['login-password']
            );

            $dbResponse = UsersModel::loginUserModel($userData, 'public.users');
            
            if($dbResponse['email'] == $_POST['login-email'] && $dbResponse['password'] == $_POST['login-password']){
            
                //inizio una sessione
                session_start();
    
                //creo una variabile di sessione
                $_SESSION['validation'] = true;
                
                if($dbResponse['role'] == '1'){
                    $_SESSION['admin'] = true ;
                }
               
                if($_SESSION['validation'] && $_SESSION['admin']){
                    header('location:index.php?action=private-admin');
                    exit();
                }
                if($_SESSION['validation']) {
                    header('location:index.php?action=private-user');  
                    exit();
                } 
                
    
                
            } else{
                header('location:index.php?action=error');
                exit();
            }  
        }
    }

    public function createUserController(){
        if(isset($_POST['create-user-submit'])){
            $userData = array(
                'email' => $_POST['create-email'],
                'password' => $_POST['create-password'],
                'first-name' => $_POST['create-first-name'],
                'last-name' => $_POST['create-last-name'],
                'role' => $_POST['create-role'],
            );
            $notEmptyInputs = notEmptyInputs($userData);
            if($notEmptyInputs){
                $dbResponse = UsersModel::createUserModel($userData, 'public.users');

                if($dbResponse == 'success'){
                    echo'<h1>User added corectly</h1>';
                }else{
                    echo'error erro error';
                }
            }else{
                echo'Fill all inputs';
            }
          
        }

        
    }

   
}