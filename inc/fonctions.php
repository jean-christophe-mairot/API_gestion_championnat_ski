<?php

include 'bdd.php';

function getAll()
{
    $bdd = getBdd();
    $result = $bdd->query("SELECT * FROM participants");
    $annonces = $result->fetchall();
    return $annonces;
}
?>