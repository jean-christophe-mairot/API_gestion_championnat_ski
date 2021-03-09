<?php
session_start();
// Call the function bdd
require 'inc/bdd.php';
// Use function bdd
$db = getBdd();

if($_POST){
    // Checking if the fields are empty
    if(isset($_POST['nom_epreuve']) && !empty($_POST['nom_epreuve'])
    &&(isset($_POST['date_epreuve']) && !empty($_POST['date_epreuve']))
    && isset($_POST['id_categorie']) && !empty($_POST['id_categorie'])){

        //  Strip HTML and PHP tags from a string
        $nom_epreuve = strip_tags($_POST['nom_epreuve']);
        $date_epreuve = strip_tags($_POST['date_epreuve']);
        $id_categorie = strip_tags($_POST['id_categorie']);
        
        // Request Sql
        $sql = 'INSERT INTO epreuves (nom_epreuve, date_epreuve, id_categorie) 
        VALUES (:nom_epreuve, :date_epreuve, :id_categorie);';
        
        // Prepares a statement for execution and returns a statement object
        $query = $db->prepare($sql);
        // Binds a value to a parameter
        $query->bindValue(':nom_epreuve', $nom_epreuve, PDO::PARAM_STR);
        $query->bindValue(':date_epreuve', $date_epreuve, PDO::PARAM_STR);
        $query->bindValue(':id_categorie', $id_categorie, PDO::PARAM_INT);
        // Executes a prepared statement
        $query->execute();
        // redirect to the form page
        header('location:create_Proof.php');

    }else{
        // Error Message Param
        $_SESSION['empty_field'] = "Il vous reste des champs à Remplir !";
        // redirect to the form Proof page
        header('location:create_Proof.php');
    }
}

?>











