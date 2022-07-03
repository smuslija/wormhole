<?php
class UsersModel extends Dbh{

    public static function loginUserModel($userData, $table){
        
        $stmt = Dbh::connect()->prepare("SELECT * FROM  $table WHERE email = :email");
        $stmt->bindParam("email", $userData["email"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

    public static function createUserModel($userData, $table){
        if(!empty($userData) && !empty($table)){
            $stmt = Dbh::connect()->prepare("INSERT INTO $table(email,password,first_name,last_name,role) VALUES(:email,:password,:firstName,:lastName,:role)");

            $stmt->bindParam(":email", $userData["email"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $userData["password"], PDO::PARAM_STR);
            $stmt->bindParam(":firstName", $userData["first-name"], PDO::PARAM_STR);
            $stmt->bindParam(":lastName", $userData["last-name"], PDO::PARAM_STR);
            $stmt->bindParam(':role', $userData["role"], PDO::PARAM_STR);
    
            if($stmt->execute()){
                return 'success';
    
            }else{
                return 'error';
            }
    
            $stmt->close();
        }
       
    }
}