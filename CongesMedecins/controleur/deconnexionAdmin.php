<?php
header( 'content-type: text/html; charset=utf-8' );

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentificationAdmin.inc.php";

// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

// traitement si necessaire des donnees recuperees

logoutAdmin();
$identification = getAdminLoggedOnAdmin();
                

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "authentification";
include "$racine/vue/enteteAuthentification.html.php";
include "$racine/vue/vueAuthentificationAdmin.php";
include "$racine/vue/pied.html.php";


?>