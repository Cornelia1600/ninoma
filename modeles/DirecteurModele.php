<?php 

///Les updates 

    function UpdateAccess($idpersonnel,$prenom,$nom,$login,$MDP, $idcategorie){
        $connexion=getConnect();

        $requetemodiflogin='UPDATE personnel SET IDCAT=' .$idcategorie.', NOM="' . $nom .'", PRENOM="' .$prenom.'", LOGIN="' . $login .'", MDP="' .$MDP . '" WHERE IDPERS='. $idpersonnel;
       return $resultatmodiflogin=$connexion->query($requetemodiflogin); 
    }

    function UpdateModif($newmo){
        $connexion=getConnect();

        $requetemodifmotif='UPDATE motif SET IDMO ="' .$newmo.'"';
       return $resultatmodifmotif=$connexion->query($requetemodifmotif); 
    }
    function UpdatePrix($newprix,$motifcode){
        $connexion=getConnect();

        $requetemodifprix='UPDATE motif SET PRIXMO ="' .$newprix.'" WHERE IDMO="' .$motifcode. '"';
       return $resultatmodifprix=$connexion->query($requetemodifprix); 
    }

    function Updatedocument($newpiece,$motifcode){
        $connexion=getConnect();

        $requetemodifprix='UPDATE personnel SET IDPI ="' .$newpiece.'" WHERE IDMO="' .$motifcode. '"';
       return $resultatmodifprix=$connexion->query($requetemodifprix); 
    }

    ///Les créations 

    function CreateMedecin($nommedecin,$prenommedecin, $idspemedecin){
        $connexion=getConnect();

        $requetecreatemed='INSERT INTO personnel(NOM,PRENOM,IDSP,IDCAT) VALUES ("'.$nommedecin.'","'.$prenommedecin.'", ' . $idspemedecin .', 2)' ;
		return $connexion->query($requetecreatemed);

    }

    function Createlogin($prenom,$nom,$login,$MDP,$Cat){
		$connexion=getConnect();

		$requetecreatelogin= 'INSERT INTO PERSONNEL(PRENOM,NOM,LOGIN,MDP,IDCAT)
        VALUES ("'. $prenom . '", "' . $nom . '", "' . $login . '","' . $MDP . '",' . $Cat . ')';
		return $connexion->query($requetecreatelogin);
	}

    function CreateMotif($libelle,$prix){
        $connexion=getConnect();

        $requetecreatemot='INSERT INTO motif(LIBELLEMO,PRIXMO) VALUES ("'.$libelle.'","'.$prix.'")' ;
        ;
		return array($connexion->query($requetecreatemot), $connexion->lastInsertId());// return [TRUE, 56] => motif avec l'id 56 bien créé
	
    }
        
  ///Les suppressions
  
    function DeleteMedecin($idmeds){
        $connexion=getConnect();

        $requetedeletemed='DELETE from PERSONNEL WHERE IDPERS="'.$idmeds.'"';
        return $connexion->query($requetedeletemed); 
    }


    function DeleteMotif($nommedecin,$prenommedecin){
        $connexion=getConnect();

        $requetederequetecreatemotif='INSERT INTO PERSONNEL(NOM,PRENOM) VALUES ($nommedecin,$prenommedecin)' ;
        return $connexion->query($requetederequetecreatemotif); 

    }


  ///Les affichages

    function getAllPersonnel(){
        $connexion=getConnect();

        $requetepers='SELECT * FROM personnel';
        $resultatpers=$connexion->query($requetepers); 
        $resultatpers->setFetchMode(PDO::FETCH_OBJ);
        $personnels = $resultatpers->fetchAll();
        $resultatpers->closeCursor();

        return $personnels;
    }

?>