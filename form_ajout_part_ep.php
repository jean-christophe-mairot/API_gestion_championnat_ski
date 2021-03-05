<?php
include 'inc/header.php';
include 'inc/fonctions.php';

$participants = getParticpant();

$categories = getCategorie();

$epreuves = getEpreuve();

?>
    <form action="#" method="POST">
        <div>
            <!-- Pour epreuve + cate pour aller chercher la bonne cate + ep c'est un READ SELECT -->
            <label for="Nom_epreuve">Epreuve: </label><br>
                <select name="nom_epreuve" id="type-select"> 
                <?php foreach ($epreuves as $epreuve):?>
                    <option value="<?=$epreuve['id_epreuve']?>"><?=$epreuve['nom_epreuve']?></option>
                <?php endforeach ?>
                </select>
        </div>
        <div>
            <label for="Categorie">Catégorie: </label>
                <select name="type" id="type-select"> 
                <?php foreach ($categories as $categorie):?>
                    <option value="<?=$categorie['id_categorie']?>"><?=$categorie['type']?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <label for="Participant">Participant à cette épreuve:</label>
                <?php foreach ($participants as $participant): extract($participant) ?>
                    <p><?=$nom_participant.' '.$prenom_participant?></p>
                    <input type="checkbox" name="<?=$id_participant?>">
                <?php endforeach ?>
        </div>
        <br>
        <br>
        <input type="submit" value="Enregistrer">
    </form>
<?php include 'inc/header.php'; ?>