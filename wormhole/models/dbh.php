<?php
class Dbh{

    public static function connect(){
        $conn = new PDO('pgsql:host=localhost;dbname=wormhole;', 'postgres','M26g420');
        return $conn;
    }
}