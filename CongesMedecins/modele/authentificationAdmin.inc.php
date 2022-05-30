<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.admin.inc.php";
// ------------------------------------------------------------------ ADMIN PARTIE -----------------------------------------------------------------
function loginAdmin($identifiantP, $mdpP)
{
    if (!isset($_SESSION))
    {
        session_start();
    }

    $util = getPraticienByIdentifiantA($identifiantP);
    $mdpBD = $util->getMdp();
    if (trim($mdpBD) == trim($mdpBD))
    {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["nomA"] = $identifiantP;
        $_SESSION["mdpA"] = $mdpBD;
    }
}

function logoutAdmin()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["nomA"]);
    unset($_SESSION["mdpA"]);
}

function getAdminLoggedOnAdmin()
{
    if (isLoggedOnAdmin()){
        $ret = $_SESSION["nomA"];
    }
    else {
        $ret = "";
    }
    return $ret;
}

function isLoggedOnAdmin()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["nomA"])) {
        $util = getPraticienByIdentifiantA($_SESSION["nomA"]);
        if ($util->getNom() == $_SESSION["nomA"] && $util->getMdp() == $_SESSION["mdpA"]) {
            $ret = true;
        }
    }
    return $ret;
}
?>