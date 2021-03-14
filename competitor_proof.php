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
<!-- Permet d'etre positionner au millieu et border est l'arriere plan -->
    <div class="position-absolute top-50 start-50 translate-middle border">
        <!-- titre -->
        <h1 class="text-center color">Ajout d'un participant à une épreuve</h1>
        <!-- form -->
            <form action="create_excel.php" method="POST" class="row g-3 container">
                <div class="form-floating col-md-6">
                        <select class="form-select" name="epreuve_select" id="epreuve_select"> 
                        <?php foreach ($epreuves as $epreuve):?>
                            <option value="<?=$epreuve['id_epreuve']?>"><?=$epreuve['nom_epreuve']?></option> 
                        <?php endforeach ?>
                        </select>
                        <label class="color" for="floatingInput">Epreuve: </label>
                </div>
                <div class="form-floating col-md-6">
                        <select class="form-select" name="categorie-select" id="categorie-select"> 
                        <?php foreach ($categories as $categorie):?>
                            <option value="<?=$categorie['id_categorie']?>"><?=$categorie['type']?></option>
                        <?php endforeach ?>
                        </select>
                        <label class="color" for="floatingInput">Catégorie: </label>
                </div>
            <div class="form-check">
                <label class="spacement color fw-bold" for="Participant">Participant à cette épreuve:</label>
                    <div class="part_form ">
                        <div class="dflex">
                            <?php foreach ($participants as $participant): extract($participant) ?>
                            <div class="checkParticipant">
                                <input type="checkbox" class="" value="<?=$id_participant?>" name="id_participant[]" >
                                <p><?=$nom_participant.' '.$prenom_participant?></p>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
        </form>
        <div class="row g-3 container">
            <a href="index.php" class="d-grid gap-2 return_a"><button class="btn btn-primary" type="submit">Retour au Menu</button></a>  
        </div>
    </div>
<?php include 'inc/footer.php'; ?>