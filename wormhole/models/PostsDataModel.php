<?php
class PostsDataModel extends dbh{

    public static function showAllPostsDataModel( $table){

        $stmt = Dbh::connect()->prepare("SELECT * FROM  $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }


    public static function showSinglePostDataModel($uiControllerData, $table){

        $stmt = Dbh::connect()->prepare("SELECT * FROM  $table where id = :id");
        $stmt->bindParam(":id", $uiControllerData["id"], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

    //NUOVO POST
    public static function createNewPostDataModel($uiControllerData, $table){

        $stmt = Dbh::connect()->prepare("INSERT INTO $table(title,body,userid) VALUES(:title,:body, 0)");

        $stmt->bindParam(":title", $uiControllerData["title"], PDO::PARAM_STR);
        $stmt->bindParam(":body", $uiControllerData["body"], PDO::PARAM_STR);

        if($stmt->execute()){
            return 'success';

        }else{
            return 'error';
        }

        $stmt->close();
    }


    public static function deletePostDataModel($uiControllerData, $table){

        $stmt = Dbh::connect()->prepare("DELETE FROM  $table WHERE id = :id");
        $stmt->bindParam(':id' , $uiControllerData, PDO::PARAM_INT);


        if($stmt->execute()){

            return 'success';
        }else{
            return 'error';
        }

        $stmt->close();
    }


    public static function editPostDataModel($uiControllerData, $table){

        $stmt = Dbh::connect()->prepare("UPDATE $table SET title=:title, body=:body WHERE id=:id");
        $stmt->bindParam(':id' , $uiControllerData['postId'], PDO::PARAM_INT);
        $stmt->bindParam(':title' , $uiControllerData['title'], PDO::PARAM_STR);
        $stmt->bindParam(':body' , $uiControllerData['body'], PDO::PARAM_STR);


        if($stmt->execute()){

            return 'success';
        }else{
            return 'error';
        }

        $stmt->close();
    }
}