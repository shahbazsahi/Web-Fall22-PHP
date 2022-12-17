<?php
class Database{
    private $db;

    function __construct(){
        try{
            $this->db = new PDO("mysql:host=localhost;dbname=bsse",
                "root",
                "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);;
            //print('db connected');
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    } 

    function signup($u, $p){
        $sql = "INSERT INTO `users` (`uid`, `uname`, `upas`, `created_at`) VALUES (NULL, ?, ?, current_timestamp());";
        $st = $this->db->prepare($sql);
        $st->execute(array($u, $p));
    }

    function signIn($u, $p){
        $sql = "SELECT uid FROM `users` WHERE `uname` = ? AND `upas` = ?;";
        $st = $this->db->prepare($sql);
        $st->execute(array($u, $p));
        if($st->rowCount() == 1){
            $ur = $st->fetch();
            print("Welcome: $ur[0]");
        }
        else{
            print('Login Failed');
        }
    }
}

?>