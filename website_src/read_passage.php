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

// $sql='SELECT epreuves.nom_epreuve, categories.type
// FROM epreuves, categories
// WHERE epreuves.id_categorie = categories.id_categorie';
// $query = $db->prepare($sql);
// $query->execute();
// $result = $query->fetchAll(PDO::FETCH_ASSOC);


// $sql1 ='SELECT participants.nom_participant, participants.prenom_participant FROM passages, participants WHERE participants.id_participant = passages.id_participant';
// $query1 = $db->prepare($sql1);
// $query1->execute();+
// $result1 = $query1->fetchAll(PDO::FETCH_ASSOC);

// $sql2='SELECT meilleur_temp FROM passages LIMIT 3';
// $query2 = $db->prepare($sql2);
// $query2->execute();
// $result2 = $query2->fetchAll(PDO::FETCH_ASSOC);

$sql='SELECT epreuves.nom_epreuve, categories.type, participants.nom_participant, participants.prenom_participant, passages.meilleur_temp
    FROM epreuves, categories, participants, passages
    WHERE passages.id_epreuve = epreuves.id_epreuve AND passages.id_categorie=categories.id_categorie AND passages.id_participant=participants.id_participant AND epreuves.id_categorie = categories.id_categorie ORDER BY meilleur_temp LIMIT 3';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);


 
// 

// $sql = 'SELECT MIN(meilleur_temp) FROM passages ';

// On prepare la requete
// $query = $db->prepare($sql);
// on execute la requete
// $query->execute();

// on stock le result dans un tableau assoc
// $result = $query->fetchAll(PDO::FETCH_ASSOC);
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

<p><br><?= $nom_epreuve?></p>
<p><?= $type?></p>
<p><?= $nom_participant?></p>
<p><?= $prenom_participant?></p>
<p><?= $meilleur_temp?><br></p>
<?php endforeach ?>



</body>
</html>