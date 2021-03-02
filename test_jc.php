<?php
include 'inc/header.php';
include 'inc/fonctions.php';
require 'vendor/autoload.php';

$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load("creatXl.xlsx");

$worksheet = $spreadsheet->getActiveSheet();
// Get the highest row and column numbers referenced in the worksheet
$highestRow = $worksheet->getHighestRow(); // e.g. 10
$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5

echo '<table>' . "\n";
for ($row = 1; $row <= $highestRow; ++$row) {
    echo '<tr>' . PHP_EOL;
    for ($col = 1; $col <= $highestColumnIndex; ++$col) {
        $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
        echo '<td>' . $value . '</td>' . PHP_EOL;
    }
    echo '</tr>' . PHP_EOL;
    if (! empty($nom_participant) || ! empty($prenom_participant) || ! empty( $birth_participant) || ! empty($mail_participant)) {
        $query = "INSERT INTO participants(nom_participant, prenom_participant, birth_participant, mail_participant) values(?,?,?,?)";
        $paramType = "spreadsheet";
        $paramArray = array(
            $nom_participant,
            $prenom_participant,
            $birth_participant,
            $mail_participant
        );
        $insertId = $bdd->insert($query, $paramType, $paramArray);

        if (! empty($insertId)) {
            $type = "success"; 
            $message = "Excel Data Imported iunto the Database";
        }else {
            $type = "error";
            $message = "Problem in Importing Excel Data";
        }
    }
}

echo '</table>' . PHP_EOL;
?> 


<?php
require_once 'inc/footer.php';
?>