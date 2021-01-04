<?php

include_once "bd.inc.php";

function getEtablissement() {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from etablissement");
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}   

function getEtablissementById($ETA_ID) {
    
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from etablissement where ETA_ID=:ETA_ID");
        $req->bindValue(':ETA_ID', $ETA_ID, PDO::PARAM_STR);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getEtablissementByUtilMail($UTIL_MAIL) {
    
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from etablissement where ETA_MAIL=:UTIL_MAIL");
        $req->bindValue(':UTIL_MAIL', $UTIL_MAIL, PDO::PARAM_STR);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

    function getAddEtablissement($ETA_NOM, $ETA_VILLE, $ETA_ADRESSE, $ETA_CP, $ETA_MAIL, $ETA_PROVCIVIL, $ETA_PROVNOM, $ETA_PROVPRENOM, $ETA_TEL,$ETA_SECU,$ETA_NOMSECU) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into etablissement (ETA_NOM,ETA_VILLE,ETA_ADRESSE,ETA_CP,ETA_MAIL,ETA_PROVCIVIL,ETA_PROVNOM,ETA_PROVPRENOM,ETA_TEL,ETA_SECU,ETA_NOMSECU) values(:ETA_NOM,:ETA_VILLE,:ETA_ADRESSE,:ETA_CP,:ETA_MAIL,:ETA_PROVCIVIL,:ETA_PROVNOM,:ETA_PROVPRENOM,:ETA_TEL,:ETA_SECU,:ETA_NOMSECU)");
        
        $req->bindValue(':ETA_NOM', $ETA_NOM, PDO::PARAM_STR);
        $req->bindValue(':ETA_VILLE', $ETA_VILLE, PDO::PARAM_STR);
        $req->bindValue(':ETA_ADRESSE', $ETA_ADRESSE, PDO::PARAM_STR);
        $req->bindValue(':ETA_CP', $ETA_CP, PDO::PARAM_STR);
        $req->bindValue(':ETA_MAIL', $ETA_MAIL, PDO::PARAM_STR);
        $req->bindValue(':ETA_PROVCIVIL', $ETA_PROVCIVIL, PDO::PARAM_STR);
        $req->bindValue(':ETA_PROVNOM', $ETA_PROVNOM, PDO::PARAM_STR);
        $req->bindValue(':ETA_PROVPRENOM', $ETA_PROVPRENOM, PDO::PARAM_STR);
        $req->bindValue(':ETA_TEL', $ETA_TEL, PDO::PARAM_STR);
        $req->bindValue(':ETA_SECU', $ETA_SECU, PDO::PARAM_STR);
        $req->bindValue(':ETA_NOMSECU', $ETA_NOMSECU, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getDelEtablissement($ETA_ID) {
    $resultat = -1;

    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("delete from etablissement where ETA_ID=:ETA_ID");
        $req->bindValue(':ETA_ID', $ETA_ID, PDO::PARAM_INT);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUpdateEtablissement($ETA_NOM,$ETA_VILLE,$ETA_ADRESSE,$ETA_CP,$ETA_MAIL,$ETA_PROVCIVIL,$ETA_PROVNOM,$ETA_PROVPRENOM,$ETA_TEL,$ETA_SECU,$ETA_NOMSECU,$ETA_ID){
    $resultat = -1;
    try {
$cnx = connexionPDO();
$req = $cnx->prepare("UPDATE `etablissement` SET ETA_NOM = :ETA_NOM,ETA_VILLE = :ETA_VILLE, ETA_ADRESSE = :ETA_ADRESSE,ETA_CP = :ETA_CP, ETA_MAIL = :ETA_MAIL, ETA_PROVCIVIL = :ETA_PROVCIVIL, ETA_PROVNOM = :ETA_PROVNOM, ETA_PROVPRENOM = :ETA_PROVPRENOM, ETA_TEL = :ETA_TEL, ETA_SECU = :ETA_SECU, ETA_NOMSECU = :ETA_NOMSECU WHERE `etablissement`.ETA_ID=:ETA_ID;");
        
        $req->bindValue(':ETA_NOM', $ETA_NOM, PDO::PARAM_STR);
        $req->bindValue(':ETA_VILLE', $ETA_VILLE, PDO::PARAM_STR);
        $req->bindValue(':ETA_ADRESSE', $ETA_ADRESSE, PDO::PARAM_STR);
        $req->bindValue(':ETA_CP', $ETA_CP, PDO::PARAM_STR);
        $req->bindValue(':ETA_MAIL', $ETA_MAIL, PDO::PARAM_STR);
        $req->bindValue(':ETA_PROVCIVIL', $ETA_PROVCIVIL, PDO::PARAM_STR);
        $req->bindValue(':ETA_PROVNOM', $ETA_PROVNOM, PDO::PARAM_STR);
        $req->bindValue(':ETA_PROVPRENOM', $ETA_PROVPRENOM, PDO::PARAM_STR);
        $req->bindValue(':ETA_TEL', $ETA_TEL, PDO::PARAM_STR);
        $req->bindValue(':ETA_SECU', $ETA_SECU, PDO::PARAM_STR);
        $req->bindValue(':ETA_NOMSECU', $ETA_NOMSECU, PDO::PARAM_STR);
        $req->bindValue(':ETA_ID', $ETA_ID, PDO::PARAM_INT);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getEtabIdByInfo($etablissement) {
    
    $etablissement=explode(" - ",$etablissement);
    $ETA_NOM=$etablissement[0];
    $ETA_VILLE=$etablissement[1];

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select ETA_ID from etablissement where ETA_NOM=:ETA_NOM AND ETA_VILLE=:ETA_VILLE");
        $req->bindValue(':ETA_NOM', $ETA_NOM, PDO::PARAM_STR);
        $req->bindValue(':ETA_VILLE', $ETA_VILLE, PDO::PARAM_STR);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat['ETA_ID'];
}
?>