<?php
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


var_dump($spreadsheet);
// 
//$reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
//$spreadsheet = $reader->load("05featuredemo.html");


echo"<br>";
echo "je suis la page de read excel";


//utilisation de la fonction getAll 
$allParticipants= getAll();
//-----------------------------------------------------------------
//-------------------mettre la requete de yoannnn -----------------
//-----------------------------------------------------------------


// ici ton code!


//-----------------------------------------------------------------
//-----------------------------------------------------------------
?> 

<!-- test affichage des participants -->
<?php foreach($allParticipants as $allParticipant): extract ($allParticipant)?>
<p><?=$nom_participant?></p>
<p><?=$prenom_participant?></p>
<p><?=$birth_participant?></p>
<p><?=$mail_participant?></p>
<?php endforeach;?>

<!-- contenu -->

<?php
require_once 'inc/footer.php';
?>