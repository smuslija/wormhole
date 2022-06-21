<?php
require('models/dbh.php');

class UsersDataModel extends Dbh{

    public static function loginUsersDataModel($uiControllerData, $table){

        $stmt = Dbh::connect()->prepare("SELECT email,password FROM  $table WHERE email = :email");
        $stmt->bindParam("email", $uiControllerData["email"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }


    public static function showUsersListUsersDataModel( $table){

        $stmt = Dbh::connect()->prepare("SELECT * FROM  $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }


    public static function showsingleUserDataModel($uiControllerData, $table){

        $stmt = Dbh::connect()->prepare("SELECT * FROM  $table WHERE id = :id");
        $stmt->bindParam("id", $uiControllerData["id"], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

    
    //REGISTRA NUOVO UTENTE
    public static function signUpNewUserDataModel($uiControllerData, $table){

        $stmt = Dbh::connect()->prepare("INSERT INTO $table(email,password) VALUES(:email,:password)");

        $stmt->bindParam(":email", $uiControllerData["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $uiControllerData["password"], PDO::PARAM_STR);

        if($stmt->execute()){
            return 'success';

        }else{
            return 'error';
        }

        $stmt->close();
    }


    
    public static function deleteUserDataModel($uiControllerData, $table){

        $stmt = Dbh::connect()->prepare("DELETE FROM  $table WHERE id = :id");
        $stmt->bindParam(':id' , $uiControllerData, PDO::PARAM_INT);


        if($stmt->execute()){
            return 'success';
        }else{
            return 'error';
        }

        $stmt->close();
    }

    public static function editUserDataModel($uiControllerData, $table){

        $stmt = Dbh::connect()->prepare("UPDATE $table SET email =:email, password=:password WHERE id=:id");
        $stmt->bindParam(':id' , $uiControllerData['id'], PDO::PARAM_INT);
        $stmt->bindParam(':email' , $uiControllerData['email'], PDO::PARAM_STR);
        $stmt->bindParam(':password' , $uiControllerData['password'], PDO::PARAM_STR);


        if($stmt->execute()){

            return 'success';
        }else{
            return 'error';
        }

        $stmt->close();
    }
}