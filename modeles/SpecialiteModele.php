<?php 
    function getAllSpecialites(){
        $connexion=getConnect();

        $requeteSpecialite='SELECT * FROM specialite';
        $resultatSpecialite=$connexion->query($requeteSpecialite); 
        $resultatSpecialite->setFetchMode(PDO::FETCH_OBJ);
        $specialites = $resultatSpecialite->fetchAll();
        $resultatSpecialite->closeCursor();

        return $specialites;
    }

?>