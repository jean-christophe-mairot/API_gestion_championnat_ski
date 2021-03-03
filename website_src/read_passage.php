<?php
try{
    // Connexion base de donnée
    $db = new PDO('mysql:host=localhost;dbname=db_api', 'root','');
    $db->exec('SET NAMES "UTF8"');

}catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
} 

$sql = 'SELECT id_categorie, id_epreuve, id_participant, MIN(meilleur_temp) FROM `passages` GROUP BY id_participant LIMIT 3';
// $sql = 'SELECT MIN(meilleur_temp) FROM passages ';

// `participants`,`categories`,
// On prepare la requete
$query = $db->prepare($sql);
// on execute la requete
$query->execute();

// on stock le result dans un tableau assoc
$result = $query->fetchAll(PDO::FETCH_ASSOC);



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
<p><?= $meilleur_temp?></p>
<!-- <?= $prenom_participant?> -->
<?php endforeach ?>  


</body>
</html>