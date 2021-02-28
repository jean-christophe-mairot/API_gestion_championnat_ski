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
//instanciation de la class Spreadsheet
$spreadsheet = new Spreadsheet();
//get la feuille active
$sheet = $spreadsheet->getActiveSheet();

//set default font
$spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Bahnschrift')
            ->setSize(10);

//text area simple
$spreadsheet->getActiveSheet()
            ->setCellValue('A1',"String")
            ->setCellValue('B1',"Simple Text")
            ->setCellValue('C1',"This is PhpSpreadSheet");
//si on veut afficher tous les participants
foreach($allParticipants as $participant){
    //colonne des A pour les id
    $colA = 1; 
    //colonne des B pour nom_participant
    $colB = 1; 
    //colonne des C pour prenom_participant
    $colC = 1; 
    //colonne des D birth_participant
    $colD = 1; 
    //colonne des E mail_participant
    $colE = 1; 
    

    //text area simple
    $spreadsheet->getActiveSheet()
            ->setCellValue('A'.$colA,"String")
            ->setCellValue('B'.$colB,"Simple Text")
            ->setCellValue('C'.$colC,"This is PhpSpreadSheet");

    //incrementation de la colonne des A pour les id
    $colA = $colA++; 
    //incrementation de la colonne colonne des B pour nom_participant
    $colB = $colB++; 
    //incrementation de la colonne colonne des C pour prenom_participant
    $colC = $colB++; 
    //incrementation de la colonne colonne des D birth_participant
    $colD = $colC++; 
    //incrementation de la colonne colonne des E mail_participant
    $colE = $colE++;       
}


//set les valeur dans les cellules
$sheet->setCellValue('A1', 'jc !');
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