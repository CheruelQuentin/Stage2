<?php

include_once "modele/bd.travailler.inc.php";

$TRA_ENS=$_POST['TRA_ENS'];
$TRA_ETA=$_POST['TRA_ETA'];
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

getDelTravailler($TRA_ENS,$TRA_ETA);


// traitement si necessaire des donnees recuperees

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste travailler";
include "vue/entete.html.php";
include "vue/vueSupTravailler.php";
include "vue/pied.html.php";
?>