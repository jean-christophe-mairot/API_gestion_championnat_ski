<?php
try{
    // Connexion base de donnée
    $db = new PDO('mysql:host=localhost;dbname=db_api', 'root','');
    $db->exec('SET NAMES "UTF8"');

}catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
} 

$sql = 'SELECT * FROM `passages`,`participants`,`categories`';

// $rg=[$sql, $joint_ep, $joint_ca, $joint_pa];

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
<?= $nom_participant?>
<?php endforeach ?>  


</body>
</html>