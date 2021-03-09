<?php
session_start();
// Call the function bdd
require 'inc/bdd.php';
// Use function bdd
$db = getBdd();

if($_POST && $_FILES){
    // Checking if the fields are empty
    if(isset($_POST['nom_participant']) && !empty($_POST['nom_participant'])
    && isset($_POST['prenom_participant']) && !empty($_POST['prenom_participant'])
    && isset($_POST['birth_participant']) && !empty($_POST['birth_participant'])
    && isset($_POST['mail_participant']) && !empty($_POST['mail_participant'])
    && isset($_FILES['img_participant']) && !empty($_FILES['img_participant'])){

        //  Strip HTML and PHP tags from a string
        $nom_participant = strip_tags($_POST['nom_participant']);
        $prenom_participant = strip_tags($_POST['prenom_participant']);
        $birth_participant = strip_tags($_POST['birth_participant']);
        $mail_participant = strip_tags($_POST['mail_participant']);

        // import file
        $uploadchemin = 'asset/img_participant/';
        $uploadfichier = $uploadchemin . basename($_FILES['img_participant']['name']);
        if(!move_uploaded_file($_FILES['img_participant']['tmp_name'], $uploadfichier)){
            $_SESSION['error_file'] = "Il y a eu une erreur sur l'importation de la photo";
        }
        // end of import file

        // Request Sql
        $sql = 'INSERT INTO participants (nom_participant, prenom_participant, birth_participant, mail_participant, img_participant) VALUES (:nom_participant, :prenom_participant, :birth_participant, :mail_participant, :img_participant)';
        
        // Prepares a statement for execution and returns a statement object
        $query = $db->prepare($sql);
        // Binds a value to a parameter
        $query->bindValue(':nom_participant', $nom_participant, PDO::PARAM_STR);
        $query->bindValue(':prenom_participant', $prenom_participant, PDO::PARAM_STR);
        $query->bindValue(':birth_participant', $birth_participant, PDO::PARAM_STR);
        $query->bindValue(':mail_participant', $mail_participant, PDO::PARAM_STR);
        $query->bindValue(':img_participant', $uploadfichier, PDO::PARAM_STR);
        // Executes a prepared statement
        $query->execute();
        // redirect to the form Competitor page
        header('location:create_Competitor.php');
    }else{
        // Error message Param
        $_SESSION['empty_field'] = "Il vous reste des champs à Remplir !";
        // redirect to the form Competitor page
        header('location:create_Competitor.php');
    }
}

?>

