<?php
require_once "inc/header.php";
include 'inc/fonctions.php';
require 'vendor/autoload.php';

//charge le namespace de la class Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//charge le name space de la class Xlsx
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//recup dans la bdd tous les participants 
$allParticipants= getAll();
//var_dump($allParticipants);
//instanciation de la class Spreadsheet
$spreadsheet = new Spreadsheet();
//get la feuille active
$sheet = $spreadsheet->getActiveSheet();

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

foreach($allParticipants as $participant){
    
   //incrementation de la colonne des A pour les id_participant
   $colA =$colA+1;
   //incrementation de la colonne des B pour les nom_participant
   $colB =$colB+1;
   //incrementation de la colonne des C pour les prenom_participant
   $colC =$colC+1; 
   //incrementation de la colonne des D pour les birth_participant
   $colD =$colD+1;
   //incrementation de la colonne des E pour les mail_participant
   $colE =$colE+1;

    //concatenation nom des col et numero de col   
    $cellA='A'.$colA;
    $cellB='B'.$colB;
    $cellC='C'.$colC;
    $cellD='D'.$colD;
    $cellE='E'.$colE;

    //set les valeurs dans les cellules
    $spreadsheet->getActiveSheet()
             ->setCellValue($cellA,$participant["id_participant"])
             ->setCellValue($cellB,$participant["nom_participant"])
             ->setCellValue($cellC,$participant["prenom_participant"])
             ->setCellValue($cellD,$participant["birth_participant"])
             ->setCellValue($cellE,$participant["mail_participant"])
             ;

         
}

//instanciation de la class Xlsx qui utilise l'instance de spreadsheet
$writer = new Xlsx($spreadsheet);
//ecrit le fichier dans le directory : là c au même niveau que create_excel.php
$writer->save('hello world.xlsx');



//var_dump($writer);

echo"<br>";
echo "je suis sur la page de creat excel";
?>

<!-- contenu -->

<?php
require_once "inc/footer.php";
?>