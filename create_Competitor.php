<?php
session_start();
require_once 'inc/header.php';
?>
<div class="position-absolute top-50 start-50 translate-middle border">
    <h1 class="text-center color">Formulaire Participant</h1>
    <form method="POST" action="crud_Competitor.php" enctype="multipart/form-data" class="row g-3 container">
        <!-- error message -->
        <?php
                    // error field not complete
                    if(!empty($_SESSION['empty_field'])){
                        echo '<div class="alert alert-danger" role="alert">
                             '. $_SESSION ['empty_field'].'
                             </div>';
                            $_SESSION['empty_field'] = '';
                    }
                    // error file
                    if(!empty($_SESSION['error_file'])){
                        echo '<div class="alert alert-danger" role="alert">
                             '. $_SESSION ['error_file'].'
                             </div>';
                            $_SESSION['error_file'] = '';
                    }
        ?>
        <!-- end of error message -->
        <div class="form-floating col-md-6">     
            <input class="form-control" type="text" id="floatingInput" name="nom_participant" placeholder="Nom">
            <label for="floatingInput" class="color">Nom</label><br>
        </div>
        <div class=" form-floating col-md-6">    
            <input class="form-control" type="text" name="prenom_participant" placeholder="Prenom">
            <label for="floatingInput" class="color">Prenom</label><br>
        </div>
        <div class="form-floating col-md-6">    
            <input type="date" class="form-control" name="birth_participant" placeholder="Date de naissance">
            <label for="floatingInput" class="color">Date de naissance</label><br>
        </div>
        <div class="form-floating col-md-6">    
            <input class="form-control" type="email" name="mail_participant" placeholder="Email">
            <label for="floatingInput" class="color">Mail</label><br>
        </div>    
        <div>
            <label class="form-label fs-5 color fw-bold" for="formFileLg">Photo du Participant</label><br>  
            <input class="form-control form-control-lg" type="file" name="img_participant"> 
        </div>
        
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Ajouter</button>
        </div>
    </form>
</div>

<?php
require_once 'inc/footer.php';
?>