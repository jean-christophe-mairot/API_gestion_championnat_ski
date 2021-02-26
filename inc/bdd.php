<?php

//function connexion bdd
function getBdd()
{
    try{
        $user ="root";
        $pass ="";
        $pdo = new PDO('mysql:host=localhost;dbname=db_api', $user, $pass, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,	
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
        return $pdo;
    }catch (PDOException $e){
        print "Erreur !: ". $e->getMessage() . "</br>";
        die();
    }

}

?>