<?php

include 'bdd.php';

function getAll()
{
    $bdd = getBdd();
    $result = $bdd->query("SELECT * FROM participants");
    $annonces = $result->fetchall();
    return $annonces;
}
//a remettre en forme aprés test sur test_jc.php

//---------------------------------------------------------
//-------------------- fonction yoann ---------------------
//---------------------------------------------------------

// Recupération le podium
function getResult()
{
    $bdd = getBdd();
    $result = $bdd->query("SELECT epreuves.nom_epreuve, categories.type, participants.nom_participant, participants.prenom_participant, passages.temp_1, passages.temp_2, passages.meilleur_temp
                           FROM epreuves, categories, participants, passages
                           WHERE passages.id_epreuve = epreuves.id_epreuve AND passages.id_categorie=categories.id_categorie AND passages.id_participant=participants.id_participant AND epreuves.id_categorie = categories.id_categorie ORDER BY passages.meilleur_temp LIMIT 3 ");
    $annonces = $result->fetchAll(PDO::FETCH_ASSOC);
    return $annonces;
}

// Récupération de l'id, prenom, nom du participant
function getParticpant()
{
    $bdd = getBdd();
    $result = $bdd->query("SELECT id_participant, nom_participant, prenom_participant FROM participants");
    $annonces_pa = $result->fetchAll(PDO::FETCH_ASSOC);
    return $annonces_pa;
}

// Récupération de l'id, nom, date de l'épreuve
function getEpreuve()
{
    $bdd = getBdd();
    $result = $bdd->query("SELECT id_epreuve, nom_epreuve, date_epreuve FROM epreuves");
    $annonces_ep = $result->fetchAll(PDO::FETCH_ASSOC);
    return $annonces_ep;
}

// Récupération de l'id, type de catégorie
function getCategorie()
{
    $bdd = getBdd();
    $result = $bdd->query("SELECT id_categorie, type FROM categories");
    $annonces_ca = $result->fetchAll(PDO::FETCH_ASSOC);
    return $annonces_ca;
}


//--------------------------------------------------------
//------------------Pour le Form qui génère --------------
//---------------la feuille excel de l'épreuve------------
//--------------------------------------------------------
function getFromGenerateParticipant($id_participant) {
    $bdd = getBdd();
    $result = $bdd->query("SELECT nom_participant, prenom_participant FROM participants WHERE id_participant=$id_participant");
    $allParticipants = $result->fetchall();
    return $allParticipants;
}

function getFromGenerateEpreuve($id_epreuve) {
    $bdd = getBdd();
    $result = $bdd->query("SELECT nom_epreuve, date_epreuve FROM epreuves WHERE id_epreuve=$id_epreuve");
    $allEpreuves = $result->fetchall();
    return $allEpreuves;
}
function getFromGenerateCategorie($id_categorie) {
    $bdd = getBdd();
    $result = $bdd->query("SELECT type FROM categories WHERE id_categorie=$id_categorie");
    $allcategories = $result->fetchall();
    return $allcategories;
}
//fonction de delete de la table passage
function deleteAllPassage() {
    $bdd = getBdd();
    $result = $bdd->query("DELETE * FROM `passages`");
    $deleteAllPassage = $result->fetchall();
    return $deleteAllPassage;
}



// fonction de test
function test($arg){
    
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
    echo "<br>";


}

?>