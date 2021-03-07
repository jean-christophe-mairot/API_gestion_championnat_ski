<?php
include 'inc/header.php';
include 'inc/fonctions.php';

//fonction recup les data de participants
$participants = getParticpant();
//fonction recup les data de categories
$categories = getCategorie();
//fonction recup les data de epreuves
$epreuves = getEpreuve();

?>
    <form action="create_excel.php" method="POST">
        <div>
            <!-- Pour epreuve + cate pour aller chercher la bonne cate + ep c'est un READ SELECT -->
            <label for="epreuve_select">Epreuve: </label><br>
                <select name="epreuve_select" id="epreuve_select"> 
                <?php foreach ($epreuves as $epreuve):?>
                    <option value="<?=$epreuve['id_epreuve']?>"><?=$epreuve['nom_epreuve']?></option> 
                <?php endforeach ?>
                </select>
                
        </div>
        <div>
            <label for="categorie-select">Catégorie: </label>
                <select name="categorie-select" id="categorie-select"> 
                <?php foreach ($categories as $categorie):?>
                    <option value="<?=$categorie['id_categorie']?>"><?=$categorie['type']?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <label for="Participant">Participant à cette épreuve:</label>
                <?php foreach ($participants as $participant): extract($participant) ?>
                    <p><?=$nom_participant.' '.$prenom_participant?></p>
                    <!-- pour les checkbox  name="participants[]" insert les données dans un tableau <=$id_participant>-->
                    <input type="checkbox" value="<?=$id_participant?>" name="id_participant[]">
                <?php endforeach ?>
        </div>
        <br>
        <br>
        <input type="submit" value="Enregistrer">
    </form>
<?php include 'inc/header.php'; ?>