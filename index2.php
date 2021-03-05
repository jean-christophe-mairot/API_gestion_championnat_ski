
<?php
require_once ("inc/header.php");
?>

    <form action="create_epreuve.php" method="post">

        <label>Epreuve</label>
        <input type="text" name="nom_epreuve" placeholder="Entrez votre épreuve">
        <br><br>
        
        <label>Date de l'Epreuve</label>
        <input type="date" name="date_epreuve">
        <br><br>

        <label>Catégories</label>
        <select name="id_categorie" required>
            <option value=""></option>

            <option value="1">M1</option>
            <option value="2">M2</option>
            </select>
        <!-- <input type="nombre" name="id_categorie" placeholder="Entrez votre catégorie"> -->
        <br><br>


        <input type="submit" value="envoyer">

    </form>

<?php
require_once ("inc/footer.php");
?>


