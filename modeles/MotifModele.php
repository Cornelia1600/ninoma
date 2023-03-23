<?php 
    function getAllMotifs(){
        $connexion=getConnect();

        $requeteMotifs='SELECT * FROM motif';
        $resultatMotifs=$connexion->query($requeteMotifs); 
        $resultatMotifs->setFetchMode(PDO::FETCH_OBJ);
        $motifs= $resultatMotifs->fetchAll();
        $resultatMotifs->closeCursor();

        return $motifs;
    }

    function getMotifById($id){
        $connexion=getConnect();

        $requete='SELECT * FROM motif WHERE IDMO="' . $id . '"';
        $resultat=$connexion->query($requete); 
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        $motif = $resultat->fetch();
        $resultat->closeCursor();

        return $motif;    
    }

    
    function CreateMotif($libelle,$prix){
        $connexion=getConnect();

        $requetecreatemot='INSERT INTO motif(LIBELLEMO,PRIXMO) VALUES ("'.$libelle.'","'.$prix.'")' ;
        ;
		return array($connexion->query($requetecreatemot), $connexion->lastInsertId());// return [TRUE, 56] => motif avec l'id 56 bien créé
	
    }
?>