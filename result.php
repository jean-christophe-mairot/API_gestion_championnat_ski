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

<!-- test affichage des participants -->
<?php foreach($allParticipants as $allParticipant): extract ($allParticipant)?>
<p><?=$nom_epreuve?></p>
<p><?=$type?></p>
<p><?=$nom_participant?></p>
<p><?=$prenom_participant?></p>
<p><?=$meilleur_temp?></p>

<?php endforeach;?>
<div class="d-grid gap-2 all_center">
  <a href="index.php"><button class="btn btn-primary" type="submit">Retour au Menu</button></a>  
</div>
<!-- contenu -->
<?php
require_once 'inc/footer.php';
?>
