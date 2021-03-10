<?php
session_start();
require_once ("inc/header.php");
?>
<!-- Permet d'etre positionner au millieu et border est l'arriere plan -->
    <div class="position-absolute top-50 start-50 translate-middle border">
        <!-- titre -->
        <h1 class="text-center color">Ajouter une Epreuve</h1>
        <!-- formulaire -->
        <form method="POST" action="crud_Proof.php"  class="row g-3 container">
            <!-- error message -->
            <?php
                // error field not complete
                if(!empty($_SESSION['empty_field'])){
                    echo '<div class="alert alert-danger" role="alert">
                        '. $_SESSION ['empty_field'].'
                        </div>';
                        $_SESSION['empty_field'] = '';
                }
            ?>
            <!-- end of error message -->
            <!-- epreuve -->
            <div class="form-floating col-md-6">     
                <input class="form-control" type="text" id="floatingInput" name="nom_epreuve">
                <label for="floatingInput" class="color">Entrez votre Epreuve</label> <br>
            </div>
            <!--date épreuve -->
            <div class="form-floating col-md-6">    
                <input class="form-control" type="date" name="date_epreuve">
                <label for="floatingInput" class="color">Date de l'épreuve</label> <br>
            </div>
            <!-- catégorie -->
            <div class="form-floating col-md-6">    
                <select class="form-select" name="id_categorie" required>
                    <option value="1">M1</option>
                    <option value="2">M2</option>
                </select> 
                <label for="floatingInput" class="color">Catégories</label> <br>
            </div>
            <!-- ajouter -->
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Ajouter</button>
            </div>
        </form>
        <!-- retour au menu -->
        <div class="row g-3 container">
            <a href="index.php"  class="d-grid gap-2 return_a"><button class="btn btn-primary" type="submit">Retour au Menu</button></a>  
        </div>
    </div>
<?php
require_once ("inc/footer.php");
?>


