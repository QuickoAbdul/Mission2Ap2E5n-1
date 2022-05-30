<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";
include_once "$racine/classes/admin.php";

function getAdmin()
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select admin.id as idA, admin.nom as nomA, mdp");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne)
        {
            $resultat[] = new admin($ligne['idA'],$ligne['nomA'],$ligne['mdp']);
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPraticienByIdA($idA)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select admin.id as idA, admin.nom as nomP, mdp where admin.id=:idA");
        $req->bindValue(':idA', $idA, PDO::PARAM_INT);
        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = new admin($ligne['idA'],$ligne['nomA'],$ligne['mdp']);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getPraticienByIdentifiantA($nomA)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select admin.id as idA, admin.nom as nomA, mdp from admin where nom=:nomA");
        $req->bindValue(':nomA', $nomA, PDO::PARAM_STR);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = new admin($ligne['idA'],$ligne['nomA'],$ligne['mdp']);
    }
    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>