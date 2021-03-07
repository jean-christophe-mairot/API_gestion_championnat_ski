<?php
include 'inc/bdd.php';
include 'inc/header.php';
require 'vendor/autoload.php';



echo "page de test jc";

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

for ($i=0; $i <$highestRow ; $i++) { 
    $bdd = getBdd();
    $input=$i;
    $tabs=$values[$input];

    $tab=$tabs[0];//id participant
    $id_participant=$tab;

    $tab3=$tabs[3];
    $id_epreuve=$tab3;

    $tab6=$tabs[6];
    $temp_1=$tab6;
    var_dump($temp_1);

    $tab7=$tabs[7];
    $temp_2=$tab7;

    $tab8=$tabs[8];
    $meilleur_temp=$tab8;

    $tab9=$tabs[9];
    $id_categorie=$tab9;

    $request=$bdd->prepare("INSERT INTO passages (`id_epreuve`, `id_categorie`, `id_participant`, `temp_1`, `temp_2`, `meilleur_temp`)
                            VALUES(?,?,?,?,?,?)");
    $request->execute(array($id_epreuve,$id_categorie,$id_participant,$temp_1,$temp_2,$meilleur_temp));
      

}

?> 


<!-- html -->


<?php
require_once 'inc/footer.php';
?>