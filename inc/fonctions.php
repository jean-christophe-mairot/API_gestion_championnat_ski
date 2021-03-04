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
//------------------------ fonction yoann -----------------
//---------------------------------------------------------

function getResult()
{
    $bdd = getBdd();
    $result = $bdd->query("SELECT epreuves.nom_epreuve, categories.type, participants.nom_participant, participants.prenom_participant, passages.meilleur_temp
                           FROM epreuves, categories, participants, passages
                           WHERE passages.id_epreuve = epreuves.id_epreuve AND passages.id_categorie=categories.id_categorie AND passages.id_participant=participants.id_participant AND epreuves.id_categorie = categories.id_categorie ORDER BY meilleur_temp  LIMIT 3");
    $annonces = $result->fetchAll(PDO::FETCH_ASSOC);
    return $annonces;
}

//---------------------------------------------------------
//--------------------------------------------------------


?>