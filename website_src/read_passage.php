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

// 
$sql ='SELECT id_epreuve, id_categorie, id_participant, meilleur_temp FROM `passages` ORDER BY `passages`.`meilleur_temp` ASC LIMIT 3
       UNION
       SELECT epreuves.nom_epreuve FROM epreuves, passages WHERE passages.id_epreuve = epreuves.id_epreuve
       UNION
       SELECT categories.type FROM categories, passages  WHERE passages.id_categorie = categories.id_categorie
       UNION
       SELECT participants.nom_participant, participants.prenom_participant FROM participants, passages WHERE passages.id_participant = participants.id_participant';


// 

// $sql = 'SELECT MIN(meilleur_temp) FROM passages ';

// On prepare la requete
$query = $db->prepare($sql);
// on execute la requete
$query->execute();

// on stock le result dans un tableau assoc
$result = $query->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);


$db = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<?php foreach ($result as $results): extract($results) ?>
<p><?= $nom_epreuve?></p>
<p><?= $type?></p>
<p><?= $nom_participant?></p>
<p><?= $prenom_participant?></p>
<p><?= $meilleur_temp?></p>
<?php endforeach ?>  


</body>
</html>