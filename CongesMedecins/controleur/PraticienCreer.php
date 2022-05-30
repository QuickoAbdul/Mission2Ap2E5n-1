<?php
header( 'content-type: text/html; charset=utf-8' );

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.conge.inc.php";
include_once "$racine/modele/bd.Praticien.inc.php";
include_once "$racine/modele/Authentification.inc.php";
include_once "$racine/modele/AuthentificationAdmin.inc.php";


// recuperation des donnees GET, POST, et SESSION


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Page à développer";
include "$racine/vue/enteteAdmin.html.php";
include "$racine/vue/vuePraticienCreer.php";
include "$racine/vue/pied.html.php";
?>