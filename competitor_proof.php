<?php
include 'inc/header.php';
include 'inc/fonctions.php';

//fonction recup les data de participants
$participants = getParticpant();
//fonction recup les data de categories
$categories = getCategorie();
//function recup les data de epreuves
$epreuves = getEpreuve();

?>
    <div class="position-absolute top-50 start-50 translate-middle border">
        <h1 class="text-center color">Ajout d'un participant à une épreuve</h1>
            <form action="create_excel.php" method="POST" class="row g-3 container">
            <div class="part_form">
                <div>
                    <label class="color spacement" for="epreuve_select">Epreuve: </label>
                        <select class="form-select" name="epreuve_select" id="epreuve_select"> 
                        <?php foreach ($epreuves as $epreuve):?>
                            <option value="<?=$epreuve['id_epreuve']?>"><?=$epreuve['nom_epreuve']?></option> 
                        <?php endforeach ?>
                        </select>
                </div>
                <div>
                    <label class="spacement color" for="categorie-select">Catégorie: </label>
                        <select class="form-select" name="categorie-select" id="categorie-select"> 
                        <?php foreach ($categories as $categorie):?>
                            <option value="<?=$categorie['id_categorie']?>"><?=$categorie['type']?></option>
                        <?php endforeach ?>
                        </select>
                </div>
            </div>
            <div class="all_center ">
                <label class="spacement color" for="Participant">Participant à cette épreuve:</label>
                    <div class="part_form">
                        <?php foreach ($participants as $participant): extract($participant) ?>
                            <p><?=$nom_participant.' '.$prenom_participant?></p>
                            <input type="checkbox" value="<?=$id_participant?>" name="id_participant[]" required>
                        <?php endforeach ?>
                    </div>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
        </form>
        <div class="d-grid gap-2 all_center">
            <a href="index.php"><button class="btn btn-primary" type="submit">Retour au Menu</button></a>  
        </div>
    </div>
<?php include 'inc/footer.php'; ?>