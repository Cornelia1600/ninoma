<?php 
    function getRdvByDate($idmedecin, $date, $heure){
        $connexion=getConnect();

        $dateTime = new DateTime($date);
        $dateTime->setTime($heure, 0);

        $requeteRdv='SELECT * FROM rdv WHERE IDPERS="'. $idmedecin. '" AND DATERDV="' . $dateTime->format('Y-m-d H:i:s'). '"';
        $resultatRdv=$connexion->query($requeteRdv); 
        $resultatRdv->setFetchMode(PDO::FETCH_OBJ);
        $rdv = $resultatRdv->fetch();
        $resultatRdv->closeCursor();

        return $rdv;
    }

?>