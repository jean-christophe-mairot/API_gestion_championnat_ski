<?php
require_once ("inc/header.php");

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//recuperation de données à implémenter dans la feuille excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'jc !');

//creation de la feuille excel
$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
var_dump($writer);

echo"<br>";
echo "je suis sur la page de creat excel";
?>

<!-- contenu -->

<?php
require_once ("inc/footer.php");
?>