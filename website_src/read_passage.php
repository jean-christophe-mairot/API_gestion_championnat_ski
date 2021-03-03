<?php
try{
    // Connexion base de donnée
    $db = new PDO('mysql:host=localhost;dbname=db_api', 'root','');
    $db->exec('SET NAMES "UTF8"');

}catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
} 

// recup un id epreuve pour l'insérer dans le where

//  Jointure de tte les tables qui se relie à la table passage
$sql='SELECT epreuves.nom_epreuve, categories.type, participants.nom_participant, participants.prenom_participant, passages.meilleur_temp
    FROM epreuves, categories, participants, passages
    WHERE passages.id_epreuve = epreuves.id_epreuve AND passages.id_categorie=categories.id_categorie AND passages.id_participant=participants.id_participant AND epreuves.id_categorie = categories.id_categorie ORDER BY meilleur_temp  LIMIT 3';
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

var_dump($result);
$db = null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>
<body>
    <section>
        <div>
            <h1><?=$nom_epreuve?></h1>
        </div>
        <div>
            <h2><?=$type?></h2>
        </div>
    </section>
    <section>
        <?php foreach ($result as $results): extract($results) ?>
            <p><?= $nom_participant?></p>
            <p><?= $prenom_participant?></p>
            <p><?= $meilleur_temp?><br></p>
        <?php endforeach ?>
    </section>
</body>
</html>