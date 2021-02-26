<?php
require_once ("inc/header.php");

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


// lecture du xlsx
$reader = new Xlsx();
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load("hello world.xlsx");

var_dump($reader);
echo"<br>";
echo "je suis la page de read excel";
?>

<!-- contenu -->

<?php
require_once ("inc/footer.php");
?>