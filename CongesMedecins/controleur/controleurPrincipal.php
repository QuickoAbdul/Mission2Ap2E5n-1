<?php
header( 'content-type: text/html; charset=utf-8' );

function controleurPrincipal($action)
{
    $lesActions = array();
    $lesActions["defaut"] = "aFaire.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["connexionAdmin"] = "connexionAdmin.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["deconnexionAdmin"] = "deconnexionAdmin.php";
    $lesActions["listeConge"] = "listeCongesPraticien.php";
    $lesActions["detailConge"] = "detailConge.php";
    $lesActions["modifierConge"] = "modifierConge.php";
    $lesActions["modificationConge"] = "modificationConge.php";
    $lesActions["supprimerConge"] = "supprimerConge.php";
    $lesActions["ajouterConge"] = "ajouterConge.php";
    $lesActions["ajoutConge"] = "ajoutConge.php";
    $lesActions["praticiencreer"] = "PraticienCreer.php";
    $lesActions["praticiencreation"] = "PraticienCreation.php";
    $lesActions["praticienmodifier"] = "PraticienModifier.php";
    $lesActions["praticiensupprimer"] = "PraticienSupprimer.php";
    $lesActions["praticiensupprission"] = "PraticienSupprission.php";
    
    
    $lesActions["homeadmin"] = "HomeAdmin.php";

    if (array_key_exists($action, $lesActions))
    {
        return $lesActions[$action];
    } 
    else
    {
        return $lesActions["defaut"];
    }
}
?>