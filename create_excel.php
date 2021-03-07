<?php
require_once "inc/header.php";
include 'inc/fonctions.php';
require 'vendor/autoload.php';

//charge le namespace de la class Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//charge le name space de la class Xlsx
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//recup dans la bdd tous les participants 
$allParticipants= getResult();
//var_dump($allParticipants);
//instanciation de la class Spreadsheet
$spreadsheet = new Spreadsheet();
//get la feuille active
$sheet = $spreadsheet->getActiveSheet();

//test pour le post de l'epreuve
echo "<pre>";
var_dump($_POST);
echo "</pre>";
//recupertion du post
echo $_POST['epreuve-select'];


//set default font
$spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Bahnschrift')
            ->setSize(10);

//si on veut afficher tous les participants
$colA = 0; 
//colonne des B pour nom_participant
$colB = 0; 
//colonne des C pour prenom_participant
$colC = 0; 
//colonne des D birth_participant
$colD = 0; 
//colonne des E mail_participant
$colE = 0; 
//colonne des D birth_participant
$colF = 0; 
//colonne des E mail_participant
$colG = 0; 

foreach($allParticipants as $participant){
    
   //incrementation de la colonne des A pour les nom_epreuve
   $colA =$colA+1;
   //incrementation de la colonne des B pour les type
   $colB =$colB+1;
   //incrementation de la colonne des C pour les nom_participant
   $colC =$colC+1; 
   //incrementation de la colonne des D pour les prenom_participant
   $colD =$colD+1;
   //incrementation de la colonne des E pour les temp_1
   $colE =$colE+1;
   //incrementation de la colonne des E pour les temp_2
   $colF =$colF+1;
   //incrementation de la colonne des E pour les meilleur_temp
   $colG =$colG+1;

    //concatenation nom des col et numero de col   
    $cellA='A'.$colA;
    $cellB='B'.$colB;
    $cellC='C'.$colC;
    $cellD='D'.$colD;
    $cellE='E'.$colE;
    $cellF='F'.$colF;
    $cellG='G'.$colG;

    //set les valeurs dans les cellules
    $spreadsheet->getActiveSheet()
             ->setCellValue($cellA,$participant["nom_epreuve"])
             ->setCellValue($cellB,$participant["type"])
             ->setCellValue($cellC,$participant["nom_participant"])
             ->setCellValue($cellD,$participant["prenom_participant"])
             ->setCellValue($cellE,$participant["temp_1"])
             ->setCellValue($cellF,$participant["temp_2"])
             ->setCellValue($cellG,$participant["meilleur_temp"])
             ;
        
}

//instanciation de la class Xlsx qui utilise l'instance de spreadsheet
$writer = new Xlsx($spreadsheet);
//ecrit le fichier dans le directory : là c au même niveau que create_excel.php
$writer->save('creatXl.xlsx');

//var_dump($writer);

echo"<br>";
echo "je suis sur la page de creat excel";
?>

<!-- contenu -->

<?php
require_once "inc/footer.php";
?>