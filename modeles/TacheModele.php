<?php
    function formatDateTache($date, $heure){
        $dateTime = new DateTime($date); 
        $dateTime->setTime($heure, 0);
        return $dateTime->format('Y-m-d H:i:s');
    }

    function creerTache($libelleTache, $heureTache, $dateTache, $idMedecin) {
        $connexion=getConnect();

        $dateTime = formatDateTache($dateTache, $heureTache); 
        $requeteinsert='INSERT INTO tacheadmin(IDPERS,LIBELLETA,DATETA) VALUES (' . $idMedecin . ', "' . $libelleTache . '", "' . $dateTime . '")';
        return $connexion->query($requeteinsert);
    }

    function getTache($idMedecin, $dateTache, $heureTache) {
        $connexion=getConnect();

        $dateTime = formatDateTache($dateTache, $heureTache); 

        $requete='SELECT * FROM tacheadmin WHERE IDPERS="'. $idMedecin. '" AND DATETA="' . $dateTime . '"';
        $resultat=$connexion->query($requete); 
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        $rdv = $resultat->fetch();
        $resultat->closeCursor();

        return $rdv;
    }

?>