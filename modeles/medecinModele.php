<?php 
    function getAllMedecins(){
        $connexion=getConnect();

        $requeteMedecins='SELECT * FROM personnel where IDCAT=2';
        $resultatMedecins=$connexion->query($requeteMedecins); 
        $resultatMedecins->setFetchMode(PDO::FETCH_OBJ);
        $Medecins = $resultatMedecins->fetchAll();
        $resultatMedecins->closeCursor();

        return $Medecins;
    }

    ?>