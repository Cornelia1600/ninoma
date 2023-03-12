<?php 
    function formatDate($date, $heure){ // Transforme date et heure en datetime
        $dateTime = new DateTime($date); // Crée un dateTime à la date du rdv 
        $dateTime->setTime($heure, 0);// On modifie l'heure du dateTime à celle du rdv
        return $dateTime->format('Y-m-d H:i:s');
    }

    function getRdvByDate($idmedecin, $date, $heure){
        $connexion=getConnect();

        $dateTime = formatDate($date, $heure); 

        $requeteRdv='SELECT * FROM rdv WHERE IDPERS="'. $idmedecin. '" AND DATERDV="' . $dateTime . '"';
        $resultatRdv=$connexion->query($requeteRdv); 
        $resultatRdv->setFetchMode(PDO::FETCH_OBJ);
        $rdv = $resultatRdv->fetch();
        $resultatRdv->closeCursor();

        return $rdv;
    }

    function insertRdv($idmedecin, $idclient, $idmotif, $date, $heure) {
        $connexion=getConnect();

        $dateTime = formatDate($date, $heure); 
        $requeteinsertrdv='INSERT INTO rdv(IDPERS,IDCL,IDMO,DATERDV, ETATRDV) VALUES (' . $idmedecin . ', ' . $idclient . ', ' . $idmotif . ', "' . $dateTime . '", "PENDING")';
        return $connexion->query($requeteinsertrdv); // Execute la requête
    }

?>