<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";
include_once "$racine/classes/praticien.php";
include_once "$racine/classes/admin.php";

function getPraticiens()
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select praticien.id as idP, identifiant, praticien.nom as nomP, prenom, adresse, coef_notoriete, salaire, mdp, libelle, ville.nom as villeP from praticien inner join type_praticien on code_type_praticien = code inner join ville on id_ville = ville.id");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne)
        {
            $resultat[] = new praticien($ligne['idP'],$ligne['identifiant'],$ligne['nomP'],$ligne['prenom'],$ligne['adresse'],$ligne['coef_notoriete'],$ligne['salaire'],$ligne['mdp'],$ligne['libelle'],$ligne['nomV']);
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPraticienByIdP($idP)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select praticien.id as idP, identifiant, praticien.nom as nomP, prenom, adresse, coef_notoriete, salaire, mdp, libelle, ville.nom as villeP from praticien inner join type_praticien on code_type_praticien = code inner join ville on id_ville = ville.id where praticien.id=:idP");
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);
        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = new praticien($ligne['idP'],$ligne['identifiant'],$ligne['nomP'],$ligne['prenom'],$ligne['adresse'],$ligne['coef_notoriete'],$ligne['salaire'],$ligne['mdp'],$ligne['libelle'],$ligne['villeP']);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPraticienByIdentifiantP($identifiantP)
{
    try
    {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select praticien.id as idP, identifiant, praticien.nom as nomP, prenom, adresse, coef_notoriete, salaire, mdp, libelle, ville.nom as villeP from praticien inner join type_praticien on code_type_praticien = code inner join ville on id_ville = ville.id where identifiant=:identifiantP");
        $req->bindValue(':identifiantP', $identifiantP, PDO::PARAM_STR);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = new praticien($ligne['idP'],$ligne['identifiant'],$ligne['nomP'],$ligne['prenom'],$ligne['adresse'],$ligne['coef_notoriete'],$ligne['salaire'],$ligne['mdp'],$ligne['libelle'],$ligne['villeP']);
    }
    catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function insertPraticien($nomP, $prenomP, $adresse, $coef_notorieteP, $type_praticienP, $salaireP, $identifiantP, $mdpP)
{
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into Praticien values (null, :nom, :prenom, :adresse, :coefnotoriete, :codepraticien, null, :salaire, :identifiant, :mdp)");
        $req->bindValue(':nom', $nomP, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenomP, PDO::PARAM_STR);
        $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $req->bindValue(':coefnotoriete', $coef_notorieteP, PDO::PARAM_STR);
        $req->bindValue(':codepraticien', $type_praticienP, PDO::PARAM_STR);
        $req->bindValue(':salaire', $salaireP, PDO::PARAM_STR);
        $req->bindValue(':identifiant', $identifiantP, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdpP, PDO::PARAM_STR);
        
        $resultat = $req->execute();

        $req = $cnx->prepare("select max(id) as maxi from praticien");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if ($ligne)
        {
            $res = $ligne['maxi'];
        }

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $res;
}

function delPraticien($nomP, $prenomP)
{
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("delete from Praticien where nom = :nom and prenom = :prenom");
        $req->bindValue(':nom', $nomP, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenomP, PDO::PARAM_STR);
        
        $resultat = $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>