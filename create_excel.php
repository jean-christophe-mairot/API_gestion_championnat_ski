<?php
require_once "inc/header.php";
include 'inc/fonctions.php';
require 'vendor/autoload.php';


//charge le namespace de la class Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//charge le name space de la class Xlsx
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




//-------------------------------------------------------------------------------------
//-----------------------    INSTANCE DE SPREADSHEET-----------------------------------


//instanciation de la class Spreadsheet
$spreadsheet = new Spreadsheet();
//get la feuille active
$sheet = $spreadsheet->getActiveSheet();


//--------------------------------------------------------------------------------------
//--------------------------------------FONT--------------------------------------------
//changer la font par defaut utilisée dans le fichier excel généré
//set default font

$spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Bahnschrift')
            ->setSize(10);
//------------------------------------------------------------------------------------
//----------------------- CELLULE TITRE COLONNE---------------------------------------
//------------------------------------------------------------------------------------

$spreadsheet->getActiveSheet()
->setCellValue('A1',"id_participants")
->setCellValue('B1',"Nom")
->setCellValue('C1',"Prenom")
->setCellValue('D1',"id_epreuve")
->setCellValue('E1',"Epreuve")
->setCellValue('F1',"Date")
->setCellValue('G1',"Temps 1")
->setCellValue('H1',"Temps 2")
->setCellValue('I1',"Meilleur Temps")
->setCellValue('J1',"id_categorie")
->setCellValue('K1',"Type")
;

//------------------------------------------------------------------------------------
//---------------------------------  PARTICIPANTS ------------------------------------
//------------------------------------------------------------------------------------
//recuperation par l'id des participants
$recupIdParticipants = $_POST['id_participant'];

//si on veut afficher tous les participants
$colA = 1; 
//colonne des B pour nom_participant
$colB = 1; 
//colonne des C pour prenom_participant
$colC = 1; 
//pour l'epreuve lié à chaque participant
$colD = 1;
$colE = 1;
$colF = 1;
$colJ = 1;
$colK = 1;
foreach ($recupIdParticipants as $recupIdParticipant) {

   
   $id_participant = $recupIdParticipant;
   $generateParticipants=getFromGenerateParticipant($id_participant);
    //incrementation de la colonne des A pour les nom_epreuve
   $colA =$colA+1;
   //concatenation nom des col et numero de col   
   $cellA='A'.$colA;

   $spreadsheet->getActiveSheet()
   ->setCellValue($cellA,$id_participant);

   //set les valeurs dans les cellules 
   foreach ($generateParticipants as $allparticipant) {
  
      //incrementation de la colonne des B pour les type
      $colB =$colB+1;
      //incrementation de la colonne des C pour les nom_participant
      $colC =$colC+1; 

      //concatenation nom des col et numero de col 
      $cellB='B'.$colB;
      $cellC='C'.$colC;
  
      $spreadsheet->getActiveSheet()
      ->setCellValue($cellB,$allparticipant["nom_participant"])
      ->setCellValue($cellC,$allparticipant["prenom_participant"])
      ;
   }
   //---------------------------------------------------------------------------
   //-------------------------- EPREUVE ----------------------------------------
   //---------------------------------------------------------------------------
   
   $recupIdEpreuves=$_POST['epreuve_select'];
   $generateEpreuves=getFromGenerateEpreuve($recupIdEpreuves);
  
   //incrémentation de la colonne D à F
   $colD =$colD+1;
  
   //concatenation nom des col et numero de col
   $cellD='D'.$colD;
   
   //renseignement des col
   $spreadsheet->getActiveSheet()
   ->setCellValue($cellD,$recupIdEpreuves);

   foreach ($generateEpreuves as $epreuve) {
  
      //incrementation de la colonne des E
      $colE =$colE+1;
      //incrementation de la colonne des F
      $colF =$colF+1; 

      //concatenation nom des col et numero de col 
      $cellE='E'.$colE;
      $cellF='F'.$colF;
  
      $spreadsheet->getActiveSheet()
      ->setCellValue($cellE,$epreuve["nom_epreuve"])
      ->setCellValue($cellF,$epreuve["date_epreuve"])
      ;
   }
   //---------------------------------------------------------------------------
   //-------------------------- CATEGORIE ----------------------------------------
   //---------------------------------------------------------------------------
   
   $recupIdCategories=$_POST['categorie-select'];
   $generateCategories=getFromGenerateCategorie($recupIdCategories);
  

    //incrémentation de la colonne D à F
    $colJ =$colJ+1;
  
    //concatenation nom des col et numero de col
    $cellJ='J'.$colJ;
    
    //renseignement des col
    $spreadsheet->getActiveSheet()
    ->setCellValue($cellJ,$recupIdCategories);
 
    foreach ($generateCategories as $categorie) {
   
       //incrementation de la colonne des E
       $colK =$colK+1;
       //concatenation nom des col et numero de col 
       $cellK='K'.$colK;
       
       $spreadsheet->getActiveSheet()
       ->setCellValue($cellK,$categorie["type"])  
       ;
    }
}



//-----------------------------------------------------------------------------
//------------------------ execution et génération du fichier slsx ------------
//-----------------------------------------------------------------------------

//instanciation de la class Xlsx qui utilise l'instance de spreadsheet
$writer = new Xlsx($spreadsheet);
//ecrit le fichier dans le directory : là c au même niveau que create_excel.php
$writer->save('uploads/creatXl.xlsx');
header('location:index.php');
?>

<!-- contenu -->

<?php
require_once "inc/footer.php";
?>