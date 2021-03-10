<?php
require_once 'inc/header.php';
include 'inc/header.php';
include 'inc/fonctions.php';
require 'vendor/autoload.php';
//charge le namespace de PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\PhpSpreadsheet;
//charge le namespace de la class Xlsx
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
// lecture du xlsx
$reader = new Xlsx();
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load("creatXl.xlsx");


// var_dump($spreadsheet);
// 
//$reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
//$spreadsheet = $reader->load("05featuredemo.html");


echo"<br>";
echo "je suis la page de read excel";


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
