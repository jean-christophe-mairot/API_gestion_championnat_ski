
<?php
require_once ("inc/header.php");
?>

    <form action="create_epreuve.php" method="post">

        <input type="text" name="nom_epreuve" placeholder="Entrez votre épreuve">
        <br><br>
        
        <input type="date" name="date_epreuve">
        <br><br>

        <input type="nombre" name="id_categorie" placeholder="Entrez votre catégorie">
        <br><br>


        <input type="submit" value="envoyer">

    </form>

<?php
require_once ("inc/footer.php");
?>


