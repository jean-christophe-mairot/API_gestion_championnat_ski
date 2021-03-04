<?php
include 'inc/fonctions.php';

$participants = getParticpant();

$categories = getCategorie();

$epreuves = getEpreuve();

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
    <form action="#" method="POST">
        <div>
            <!-- Pour epreuve + cate pour aller chercher la bonne cate + ep c'est un READ SELECT -->
            <?php foreach ($epreuves as $epreuve):?>
                <label for="Nom epreuve"><?=$epreuve["nom_epreuve"]?></label><br>
                <label for="Date epreuve"><?=$epreuve["date_epreuve"]?></label>
            <?php endforeach ?>
        </div>
        <div>
            <?php foreach ($categories as $categorie):?>
                <label for="Categorie"><?=$categorie["type"]?></label>
            <?php endforeach ?>
        </div>
        <div>
            <label for="Participant">Participant à cette épreuve:</label>
                <?php foreach ($participants as $participant): extract($participant) ?>
                    <p><?=$nom_participant.' '.$prenom_participant?></p>
                    <input type="checkbox" name="<?=$id_participant?>" placeholder="<?=$nom_participant?>">
                <?php endforeach ?>
        </div>
        <br>
        <br>
        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>