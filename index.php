<?php
require_once ("inc/header.php");
?>

<form method="POST" action="crudParticipant.php" enctype="multipart/form-data">
    <div>    
        <label for="Nom">Nom</label> <br>
        <input type="text" name="nom_participant">
    </div>
    <div>    
        <label for="Prenom">Prenom</label> <br>
        <input type="text" name="prenom_participant">
    </div>
    <div>    
        <label for="Date">Date de naissance</label> <br>
        <input type="date" name="birth_participant">
    </div>
    <div>    
        <label for="mail">Mail</label> <br>
        <input type="email" name="mail_participant">
    </div>
    <div>    
        <label for="photo">Photo</label> <br>
        <input type="file" name="img_participant">
    </div> <br>
    <button type="submit">Ajouter</button>
</form>

<?php
require_once ("inc/footer.php");
?>