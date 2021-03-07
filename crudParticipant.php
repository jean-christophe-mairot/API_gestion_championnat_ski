<?php
require 'inc/bdd.php';

$db = getBdd();

if($_POST && $_FILES){
    if(isset($_POST['nom_participant']) && !empty($_POST['nom_participant'])
    && isset($_POST['prenom_participant']) && !empty($_POST['prenom_participant'])
    && isset($_POST['birth_participant']) && !empty($_POST['birth_participant'])
    && isset($_POST['mail_participant']) && !empty($_POST['mail_participant'])
    && isset($_FILES['img_participant']) && !empty($_FILES['img_participant'])){

        $nom_participant = strip_tags($_POST['nom_participant']);
        $prenom_participant = strip_tags($_POST['prenom_participant']);
        $birth_participant = strip_tags($_POST['birth_participant']);
        $mail_participant = strip_tags($_POST['mail_participant']);

        $uploadchemin = 'asset/img_participant/';
        $uploadfichier = $uploadchemin . basename($_FILES['img_participant']['name']);
        if(!move_uploaded_file($_FILES['img_participant']['tmp_name'], $uploadfichier)){
            $_SESSION['erreurticket'] = "Pas de photo";
        }

        $sql = 'INSERT INTO participants (nom_participant, prenom_participant, birth_participant, mail_participant, img_participant) VALUES (:nom_participant, :prenom_participant, :birth_participant, :mail_participant, :img_participant)';
        
        $query = $db->prepare($sql);

        $query->bindValue(':nom_participant', $nom_participant, PDO::PARAM_STR);
        $query->bindValue(':prenom_participant', $prenom_participant, PDO::PARAM_STR);
        $query->bindValue(':birth_participant', $birth_participant, PDO::PARAM_STR);
        $query->bindValue(':mail_participant', $mail_participant, PDO::PARAM_STR);
        $query->bindValue(':img_participant', $uploadfichier, PDO::PARAM_STR);

        $query->execute();

        header('location:index.php');
    }
}

?>

