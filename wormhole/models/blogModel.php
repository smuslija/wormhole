<?php
class BlogModel extends Dbh{

    public static function loadAllPostsModel($table){
        $stmt = Dbh::connect()->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
}