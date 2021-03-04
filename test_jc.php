<?php
include 'inc/bdd.php';
include 'inc/header.php';
// include 'inc/fonctions.php';
require 'vendor/autoload.php';



echo "page de test jc";

$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load("creatXl.xlsx");

$worksheet = $spreadsheet->getActiveSheet();
// recup le haut du row et  highest row and column numbers referenced in the worksheet
$highestRow = $worksheet->getHighestRow(); // e.g. 10
$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5


echo '<table>' . "\n";
$values=[];
for ($row = 1; $row <= $highestRow; ++$row) {
    $ligne=[];
    echo '<tr>' . PHP_EOL;
    for ($col = 1; $col <= $highestColumnIndex; ++$col) {
        $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
        // ici recup les value corresponadnt à chaque cellule
      
        $ligne[]=$value;
        echo '<td>' . $value . '</td>' . PHP_EOL;
         
    }
    $values[]=$ligne;
    echo '</tr>' . PHP_EOL;
}
echo '</table>' . PHP_EOL;



//----------------------------------------------------------------------------------------------------------------------
//une boucle avec incrementation de values

for ($i=0; $i <$highestRow ; $i++) { 
    $bdd = getBdd();
    $input=$i;
    $tabs=$values[$input];

    $tab=$tabs[0];
    $id_participant=$tab;
    $tab1=$tabs[1];
    $nom_participant=$tab1;
    $tab2=$tabs[2];
    $prenom_participant=$tab2;
    $tab3=$tabs[3];
    $birth_participant=$tab3;
    $tab4=$tabs[4];
    $mail_participant=$tab4;

    $request=$bdd->prepare("UPDATE participants 
                            SET nom_participant='$nom_participant',
                                prenom_participant='$prenom_participant',
                                birth_participant='$birth_participant',
                                mail_participant='$mail_participant'

                            WHERE  id_participant = $id_participant");
    $request->execute();  



    // var_dump($nom_participant);
    // var_dump($prenom_participant);
    // var_dump($birth_participant);
    // var_dump($mail_participant);

    

}


    


//une boucle avec incrementation tabs 
// $tab=$tabs[0];
// $id_participant=$tab;



//-----------------------------------------------------


?> 


<?php
require_once 'inc/footer.php';
?>