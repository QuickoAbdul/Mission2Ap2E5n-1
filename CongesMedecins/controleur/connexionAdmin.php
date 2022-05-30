<?php
header( 'content-type: text/html; charset=utf-8' );

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentificationAdmin.inc.php";

// creation du menu burger
/*$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=connexion","label"=>"Connexion");
$menuBurger[] = Array("url"=>"./?action=inscription","label"=>"Inscription");*/

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["nomA"]) && isset($_POST["mdpA"])){
    $identificationP=$_POST["nomA"];
    $mdpP=$_POST["mdpA"];
}
else
{
    $identificationP="";
    $mdpP="";
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

// traitement si necessaire des donnees recuperees
loginAdmin($identificationP,$mdpP);

if (isLoggedOnAdmin())
{ // si l'utilisateur est connecté on redirige vers la liste des congés du praticien
    include "$racine/controleur/PraticienCreer.php";
}
else
{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    $titre = "authentification";
    include "$racine/vue/enteteAuthentification.html.php";
    include "$racine/vue/vueAuthentificationAdmin.php";
    include "$racine/vue/pied.html.php";
}

?>