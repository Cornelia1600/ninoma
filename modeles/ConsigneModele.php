<?php


function getConsignesByMotif($motifId){
    $connexion=getConnect();

    $requete='SELECT consigne.IDCO, consigne.LIBELLECO FROM comprend INNER JOIN consigne ON comprend.IDCO = consigne.IDCO WHERE comprend.IDMO ='. $motifId;
    $resultat=$connexion->query($requete); 
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $consignes = $resultat->fetchAll();
    $resultat->closeCursor();

    return $consignes;    
}


function getAllConsignes(){
    $connexion=getConnect();

    $requete='SELECT * FROM consigne';
    $resultat=$connexion->query($requete); 
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $consignes = $resultat->fetchAll();
    $resultat->closeCursor();

    return $consignes;    
}

function ajoutConsigne($codemotif,$codeconsigne){
    $connexion=getConnect();

    $requeteajoutco='INSERT INTO comprend(IDMO,IDCO) VALUES ("'.$codemotif.'","'.$codeconsigne.'")' ;
    ;
    return $connexion->query($requeteajoutco);

}




?>