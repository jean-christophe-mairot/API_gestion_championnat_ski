<?php

// connexion à la base de donnée 
try{

    $db = new PDO('mysql:host=localhost;dbname=db_api', 'root', '');
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}
// var_dump($_POST);
if($_POST){
    if(isset($_POST['nom_epreuve']) && !empty($_POST['nom_epreuve'])
    &&(isset($_POST['date_epreuve']) && !empty($_POST['date_epreuve']))
    && isset($_POST['id_categorie']) && !empty($_POST['id_categorie'])){

        // On nettoie les données envoyées
        // $id_epreuve = strip_tags($_POST['id_epreuve']);
        $nom_epreuve = strip_tags($_POST['nom_epreuve']);
        $date_epreuve = strip_tags($_POST['date_epreuve']);
        $id_categorie = strip_tags($_POST['id_categorie']);
        

        $sql = 'INSERT INTO epreuves (nom_epreuve, date_epreuve, id_categorie) 
        VALUES (:nom_epreuve, :date_epreuve, :id_categorie);';

        $query = $db->prepare($sql);
        
        
        
        $query->bindValue(':nom_epreuve', $nom_epreuve, PDO::PARAM_STR);
        $query->bindValue(':date_epreuve', $date_epreuve, PDO::PARAM_STR);
        $query->bindValue(':id_categorie', $id_categorie, PDO::PARAM_INT);
        $query->execute();
        // $resultat = $query->fetchAll(PDO::FETCH_ASSOC);

        // $_SESSION['message'] = "Produit ajouté";
        // require_once('close.php');

        // header('Location: index2.php');
    }else{
        // $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

// variables dans la base de donnée avec la variable $_POST
// $nom_epreuve = $_POST['nom_epreuve'];
// $date_epreuve = $_POST['date_epreuve'];



// // creation Epreuve

// var_dump($_POST);

// $query = $pdo->prepare('INSERT INTO epreuves (nom_epreuve, date_epreuve) VALUES (?, ?)');
// $query->execute(array($nom_epreuve,$date_epreuve));

// Update Epreuve

// $query = $pdo->prepare('UPDATE SET epreuves (nom_epreuve, date_epreuve) WHERE id = :id');
// $query->execute(array($nom_epreuve,$date_epreuve));


?>











