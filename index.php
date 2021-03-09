<?php
require_once 'inc/header.php';
?>

<div class="position-absolute top-50 start-50 translate-middle border">
    <h1 class="text-center color">API</h1>
    <div >
        <a href="create_Competitor.php" class="d-grid gap-2">
           <button class="btn btn-primary" type="submit">Ajouter des Participant</button> 
        </a>           
    </div>
    <div >
        <a href="create_Proof.php" class="d-grid gap-2">
           <button class="btn btn-primary" type="submit">Ajouter des Epreuves</button> 
        </a>        
    </div>
    <div>
        <a href="competitor_proof.php" class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Ajouter d'un participant à une épreuve</button>
        </a>    
    </div>
    <div>
        <a href="insert_passage.php" class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Importer l'exel</button>
        </a>          
    </div>
    <div >
        <a href="result.php" class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Resultat</button>
        </a>  
    </div>
</div>
<?php
require_once 'inc/footer.php';
?>