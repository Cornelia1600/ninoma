<?php


function getPiecesByMotif($motifId){
    $connexion=getConnect();

    $requete='SELECT piece.IDPI, piece.LIBELLEPI FROM demande INNER JOIN piece ON demande.IDPI = piece.IDPI WHERE demande.IDMO ='. $motifId;
    $resultat=$connexion->query($requete); 
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $pieces = $resultat->fetchAll();
    $resultat->closeCursor();

    return $pieces;    
}

?>