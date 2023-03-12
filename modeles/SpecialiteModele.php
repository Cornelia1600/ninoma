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

    function getSpecialiteById($id){
        $connexion=getConnect();

        $requete='SELECT * FROM specialite WHERE IDSP="' . $id . '"';
        $resultat=$connexion->query($requete); 
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        $specialite = $resultat->fetch();
        $resultat->closeCursor();

        return $specialite;    
    }
?>