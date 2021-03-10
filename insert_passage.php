<?php
include 'inc/bdd.php';
include 'inc/header.php';
require 'vendor/autoload.php';

if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
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
    }
}
?> 


<!-- html -->
<body>
    <!-- Permet d'etre positionner au millieu et border est l'arriere plan -->
    <div class="position-absolute top-50 start-50 translate-middle border">
    <!-- Titre -->
    <h1 class="all_center color">Importation du fichier Excel Résultat</h1><br>
    <!-- Formulaire -->
        <form action="" method="post" name="frmExcelImport" class="row g-3 container" id="frmExcelImport" enctype="multipart/form-data">
                <div>
                    <!-- Titre input -->
                    <label class="form-label fs-5 color fw-bold" for="formFileLg">Choisir fichier Excel</label>
                    <!-- Input file -->
                    <input type="file" name="file" id="file" accept=".xls,.xlsx" class="form-control form-control-lg">
                </div>
                <!-- Button importer -->
                <div class="d-grid gap-2">
                    <button type="submit" id="submit" name="import" class="btn-primary">Importer</button>
                </div>                  
        </form>
        <!-- Button retour au menu -->
        <div class="row g-3 container">
            <a href="index.php" class="d-grid gap-2 return_a"><button class="btn btn-primary" type="submit">Retour au Menu</button></a>  
        </div>
    </div>
    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?>
    </div>
<?php
require_once 'inc/footer.php';
?>