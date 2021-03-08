<?php
include 'inc/bdd.php';
include 'inc/header.php';
require 'vendor/autoload.php';

$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load("creatXlresult.xlsx");

$worksheet = $spreadsheet->getActiveSheet();
// recup le haut du row et  highest row and column numbers referenced in the worksheet
$highestRow = $worksheet->getHighestRow(); // e.g. 10
$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5

//-------------------------------------------------------------------------------------------------------------------
//------------------------------------------- TABLEAU HTML ----------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------


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
//--------------------------------une boucle avec incrementation de values----------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
$bdd = getBdd();
for ($i=1; $i <$highestRow ; $i++) { 
    
  
    $tabs=$values[$i];
    //id participant
    $id_participant=$tabs[0];

    $id_epreuve=$tabs[3];

    $temp_1=$tabs[6];
    // var_dump($temp_1);

    $temp_2=$tabs[7];

    $meilleur_temp=$tabs[8];

    $id_categorie=$tabs[9];

    $request=$bdd->prepare("INSERT INTO passages (`id_epreuve`, `id_categorie`, `id_participant`, `temp_1`, `temp_2`, `meilleur_temp`)
                            VALUES(?,?,?,?,?,?)");
    $request->execute(array($id_epreuve,$id_categorie,$id_participant,$temp_1,$temp_2,$meilleur_temp));
    // $request->debugDumpParams();

}

?> 


<!-- html -->


<?php
require_once 'inc/footer.php';
?>