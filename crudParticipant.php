<?php

// Connexion à une base de données
try{
    // Connexion base de donnée
    $db = new PDO('mysql:host=127.0.0.1;dbname=db_api', 'root','');
    $db->exec('SET NAMES "UTF8"'); /* execute la Table de caractere */
/*Capture permet un message d'erreur si pas connecter et représente une erreur émise par PDO*/
}catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage(); //récupere le message de l'exception
    die(); /*arreter l'execution du code*/
}

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

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="" enctype="multipart/form-data">
    <div>    
        <label for="Nom">Nom</label> <br>
        <input type="text" name="nom_participant">
    </div>
    <div>    
        <label for="Prenom">Prenom</label> <br>
        <input type="text" name="prenom_participant">
    </div>
    <div>    
        <label for="Date">Date de naissance</label> <br>
        <input type="date" name="birth_participant">
    </div>
    <div>    
        <label for="mail">Mail</label> <br>
        <input type="email" name="mail_participant">
    </div>
    <div>    
        <label for="photo">Photo</label> <br>
        <input type="file" name="img_participant">
    </div> <br>
    <button type="submit">Ajouter</button>
</form>
</body>
</html> -->