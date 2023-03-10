<?php 
    function getRdvByDate($idmedecin, $date, $heure){
        $connexion=getConnect();

        // Transforme date et heure en datetime
        $dateTime = new DateTime($date); // Crée un dateTime à la date du rdv 
        $dateTime->setTime($heure, 0);// On modifie l'heure du dateTime à celle du rdv

        $requeteRdv='SELECT * FROM rdv WHERE IDPERS="'. $idmedecin. '" AND DATERDV="' . $dateTime->format('Y-m-d H:i:s'). '"';
        $resultatRdv=$connexion->query($requeteRdv); 
        $resultatRdv->setFetchMode(PDO::FETCH_OBJ);
        $rdv = $resultatRdv->fetch();
        $resultatRdv->closeCursor();

        return $rdv;
    }

?>