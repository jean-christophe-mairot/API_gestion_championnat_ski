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

// ici ton code pour get pour la table passage

//---------------------------------------------------------
//--------------------------------------------------------


?>