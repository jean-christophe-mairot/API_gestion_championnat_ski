<?php
require_once 'inc/header.php';
include 'inc/header.php';
include 'inc/fonctions.php';
require 'vendor/autoload.php';
//charge le namespace de PhpSpreadsheet
// use PhpOffice\PhpSpreadsheet\PhpSpreadsheet;
// //charge le namespace de la class Xlsx
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
// // lecture du xlsx
// $reader = new Xlsx();
// $reader->setReadDataOnly(true);
// $spreadsheet = $reader->load("creatXl.xlsx");


// var_dump($spreadsheet);
// 
//$reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
//$spreadsheet = $reader->load("05featuredemo.html");





//utilisation de la fonction getAll 
$allParticipants= getResult();
//-----------------------------------------------------------------
//-------------------mettre la requete de yoannnn -----------------
//-----------------------------------------------------------------


// ici ton code!


//-----------------------------------------------------------------
//-----------------------------------------------------------------
?> 
<div class="medaille container">
  <div class="gold">
    <img src="asset/img/or.png" alt="">
  </div>
  <div class="silver">
    <img src="asset/img/argent.png" alt="">
  </div>
  <div class="once">
    <img src="asset/img/bronze.png" alt="">
  </div>
</div>
<!-- test affichage des participants -->
<!-- LA foreach ne peut pas afficher comme tu la fait ou alors il faut passer par autre chose peut etre plusieur foreach ou avec d'autre requete sql chpant des position particulairevoili voulou  -->
<?php foreach($allParticipants as $allParticipant): extract ($allParticipant)?>


<div class="display container">
  <div id="podium">
    <div>
      <h1><?=$nom_participant?> <?=$prenom_participant?></h1>
    </div>
    <div>
      <p><?=$meilleur_temp?></p>
    </div>
  </div>
</div>


<!-- <p><?=$nom_epreuve?></p>
<p><?=$type?></p>
<p><?=$nom_participant?></p>
<p><?=$prenom_participant?></p>
<p><?=$meilleur_temp?></p>




<div class="display">
  <div id="podium">
    <h1><?=$nom_participant?> <?=$prenom_participant?></h1>
      <p><?=$meilleur_temp?></p>
      
  </div>
  <div id="podium1">
    <h1><?=$nom_participant?> <?=$prenom_participant?></h1>
    <p><?=$meilleur_temp?></p>
    <img src="asset/img/argent.png" alt="">
  </div>
  <div id="podium2">
    <h1><?=$nom_participant?> <?=$prenom_participant?></h1>
    <p><?=$meilleur_temp?></p>
    <img src="asset/img/bronze.png" alt="">
  </div>
</div> -->

<?php endforeach;?>



<!-- Permet d'etre positionner au millieu et border est l'arriere plan -->
<div class="position-absolute top-50 start-50 translate-middle border">
  <!-- Permet de mettre dans un container -->
  <div class="row g-3 container">
    <!-- Button return -->
    <a href="index.php" class="d-grid gap-2 return_a">
      <button class="btn btn-primary" type="submit">Retour au Menu</button></a>  
  </div>
</div>

<!-- contenu -->
<?php
require_once 'inc/footer.php';
?>
