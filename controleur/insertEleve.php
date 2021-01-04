<?php

include_once "modele/bd.eleve.inc.php";
include_once "modele/bd.etablissement.inc.php";
include_once "modele/bd.inscrire.inc.php";
$ELE_ETA=getEtabIdByInfo($_POST['ELE_ETA']);
$ELE_NOM=$_POST['ELE_NOM'];
$ELE_PRENOM=$_POST['ELE_PRENOM'];
$ELE_DATENAISS=$_POST['ELE_DATENAISS'];
$ELE_CLASSE=$_POST['ELE_CLASSE'];
$ELE_MAIL=$_POST['ELE_MAIL'];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

if(getAddEleve($ELE_ETA, $ELE_NOM, $ELE_PRENOM, $ELE_DATENAISS, $ELE_CLASSE, $ELE_MAIL)){

//Récupération de l'id de l'élève créé
$ELE_ID=getEleveIdByInfo2($ELE_NOM, $ELE_PRENOM, $ELE_CLASSE, $ELE_ETA);
//Ajout des inscriptions aux formations
for($i=0;$i<sizeof($_POST['choixForm']);$i++){
	getAddInscrire($ELE_ID,$_POST['choixForm'][$i]);
}

header('Location: ./?action=listeEleve');
  	exit();
}


// traitement si necessaire des donnees recuperees

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des eleves";
include "vue/entete.html.php";
include "vue/vueInsertEleve.php";
include "vue/pied.html.php";
?>