<?php
header( 'content-type: text/html; charset=utf-8' );

include_once "bd.inc.php";
include_once "$racine/classes/conge.php";
include_once "bd.praticien.inc.php";

function getCongeByIdC($idC) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from conge where id=:idC");
        $req->bindValue(':idC', $idC, PDO::PARAM_INT);

        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = new conge($ligne['id'],$ligne['debut'],$ligne['fin'],$ligne['validation']);
        $resultat->setPraticien(getPraticienByIdP($ligne['idPraticien']));
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getConges() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from conge");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $res = new conge($ligne['id'],$ligne['debut'],$ligne['fin'],$ligne['validation']);
            $res->setPraticien(getPraticienByIdP($ligne['idPraticien']));
            $resultat[] = $res;
            //$resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCongesByPraticien($identifiantP) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select conge.id as idC, debut, fin, validation, idPraticien from conge inner join praticien on idPraticien = praticien.id where identifiant = :identifiantP");
        $req->bindValue(':identifiantP', $identifiantP, PDO::PARAM_STR);

        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne)
        {
            $res = new conge($ligne['idC'],$ligne['debut'],$ligne['fin'],$ligne['validation']);
            $res->setPraticien( getPraticienByIdP($ligne['idPraticien']));
            $resultat[] = $res;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updateConge($idC, $debut, $fin) {
    try {
        $cnx = connexionPDO();
        
        $req = $cnx->prepare("update conge set debut = :debut, fin = :fin where id = :idC");
        $req->bindValue(':debut', $debut, PDO::PARAM_STR);
        $req->bindValue(':fin', $fin, PDO::PARAM_STR);
        $req->bindValue(':idC', $idC, PDO::PARAM_INT);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertConge($debut, $fin, $idPraticien)
{
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into conge values (null, :debut, :fin, 0, :idPraticien)");
        $req->bindValue(':debut', $debut, PDO::PARAM_STR);
        $req->bindValue(':fin', $fin, PDO::PARAM_STR);
        $req->bindValue(':idPraticien', $idPraticien, PDO::PARAM_INT);
        
        $resultat = $req->execute();

        $req = $cnx->prepare("select max(id) as maxi from conge");
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

function delConge($idC)
{
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("delete from conge where id = :idC");
        $req->bindValue(':idC', $idC, PDO::PARAM_INT);
        
        $resultat = $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}