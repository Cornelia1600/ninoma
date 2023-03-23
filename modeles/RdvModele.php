<?php 
    function formatDateRdv($date, $heure){ // Transforme date et heure en datetime
        $dateTime = new DateTime($date); // Crée un dateTime à la date du rdv 
        $dateTime->setTime($heure, 0);// On modifie l'heure du dateTime à celle du rdv
        return $dateTime->format('Y-m-d H:i:s');
    }

    function getRdvById($idrdv){
        $connexion=getConnect();

        $requeteRdv='SELECT rdv.IDRDV, motif.PRIXMO, rdv.IDCL FROM rdv INNER JOIN motif ON rdv.IDMO=motif.IDMO WHERE rdv.IDRDV='.$idrdv;
        $resultatRdv=$connexion->query($requeteRdv); 
        $resultatRdv->setFetchMode(PDO::FETCH_OBJ);
        $rdv = $resultatRdv->fetch();
        $resultatRdv->closeCursor();

        return $rdv;
    }

    function getRdvByDate($idmedecin, $date, $heure){
        $connexion=getConnect();

        $dateTime = formatDateRdv($date, $heure); 

        $requeteRdv='SELECT * FROM rdv WHERE IDPERS="'. $idmedecin. '" AND DATERDV="' . $dateTime . '"';
        $resultatRdv=$connexion->query($requeteRdv); 
        $resultatRdv->setFetchMode(PDO::FETCH_OBJ);
        $rdv = $resultatRdv->fetch();
        $resultatRdv->closeCursor();

        return $rdv;
    }

    function insertRdv($idmedecin, $idclient, $idmotif, $date, $heure) {
        $connexion=getConnect();

        $dateTime = formatDateRdv($date, $heure); 
        $requeteinsertrdv='INSERT INTO rdv(IDPERS,IDCL,IDMO,DATERDV, ETATRDV) VALUES (' . $idmedecin . ', ' . $idclient . ', ' . $idmotif . ', "' . $dateTime . '", "PENDING")';
        return $connexion->query($requeteinsertrdv); // Execute la requête
    }

    function getRdvsOfClient($idcl){
        $connexion=getConnect();

        $requeteRdv='SELECT rdv.IDRDV, rdv.ETATRDV, rdv.DATERDV, medecin.NOM, motif.PRIXMO 
        FROM rdv INNER JOIN personnel AS medecin ON rdv.IDPERS=medecin.IDPERS INNER JOIN motif ON rdv.IDMO=motif.IDMO  
        WHERE IDCL=' . $idcl;
        $resultatRdv=$connexion->query($requeteRdv); 
        $resultatRdv->setFetchMode(PDO::FETCH_OBJ);
        $rdvs = $resultatRdv->fetchAll();
        $resultatRdv->closeCursor();

        return $rdvs;
    }

    function payerRdv($idrdv){
        $connexion=getConnect();

        $rdv = getRdvById($idrdv);
        $patient = getPatientById($rdv->IDCL);
        
        
        if ($patient->SOLDE >= $rdv->PRIXMO) {
            ajouterSolde($patient->IDCL, - $rdv->PRIXMO);// paiement
            $requeteRdvPayed = 'UPDATE rdv SET ETATRDV="PAYED" WHERE IDRDV=' . $idrdv;
            return array($connexion->query($requeteRdvPayed), $patient->IDCL); // [TRUE, 65] => paiement du rdv du client 65 : ok
        }else {
            return array(FALSE, $patient->IDCL);
        }

    }

?>