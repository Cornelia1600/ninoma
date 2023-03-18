<?php 

///Les updates 

    function UpdateLogin($newlogin,$idperso){
        $connexion=getConnect();

        $requetemodiflogin='UPDATE personnel SET LOGIN ="' .$newlogin.'" WHERE idperso="' .$idperso. '"';
       return $resultatmodiflogin=$connexion->query($requetemodiflogin); 
    }

    function UpdateMDP($newMDP,$idperso){
        $connexion=getConnect();

        $requetemodifMDP='UPDATE personnel SET MDP ="' .$newMDP.'" WHERE idperso="' .$idperso. '"';
       return $resultatmodifMDP=$connexion->query($requetemodifMDP); 
    }

    function UpdateModif($newmo,$RDVcode){
        $connexion=getConnect();

        $requetemodifmotif='UPDATE motif SET IDMO ="' .$newmo.'" WHERE IDRDV="' .$RDVcode. '"';
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

    function CreateMedecin($nommedecin,$prenommedecin){
        $connexion=getConnect();

        $requetecreatemed='INSERT INTO PERSONNEL(NOM,PRENOM) VALUES ($nommedecin,$prenommedecin)' ;
        $resultatcreatemed=$connexion->query($requetecreatemed); 
        $resultatcreatemed->closeCursor();

    }

    function CreateCat($nommedecin,$prenommedecin,$specmedecin){
        $connexion=getConnect();

        $requetecreatespe='INSERT INTO CATEGORIE (IDCAT) VALUES (2)
        select * from PERSONNEL NATURAL JOIN CATEGORIE where NOM=$nommedecin AND PRENOM=$prenommedecin';
        $resultatcreatespe=$connexion->query($requetecreatespe); 
        $resultatcreatespe->closeCursor();
    }

    function CreateSpecialite($nommedecin,$prenommedecin,$specmedecin){
        $connexion=getConnect();

        $requetecreatespe='UPDATE SPECIALITE SET LIBELLESP="'.$specmedecin.'"
        where NOM="'.$nommedecin.'". AND PRENOM="'.$prenommedecin.'"';
        echo $requetecreatespe;
		return $connexion->query($requetecreatespe);
    }

    function Createlogin($prenom,$nom,$login,$MDP){
		$connexion=getConnect();

		$requetecreatelogin= 'UPDATE PERSONNEL SET LOGIN="'.$login.'", MDP="'.$MDP.'"
        WHERE NOM="'.$nom.'" AND PRENOM="'.$prenom.'"';
		echo $requetecreatelogin;
		return $connexion->query($requetecreatelogin);
	}
    function CreateMotif($prenom,$nom,$login,$MDP){
	
    }
        
  ///Les suppressions
  
    function DeleteMedecin($prenom,$nom){
        $connexion=getConnect();

        $requetedeletemed='DELETE from PERSONNEL WHERE NOM="'.$nom.'" AND PRENOM="'.$prenom.'"';
        $resultatdeletemedecin=$connexion->query($requetedeletemed); 
        $resultatdeletemedecin->closeCursor();
    }


    function DeleteMotif($nommedecin,$prenommedecin){
        $connexion=getConnect();

        $requetecreatemed='INSERT INTO PERSONNEL(NOM,PRENOM) VALUES ($nommedecin,$prenommedecin)' ;
        $resultatcreatemed=$connexion->query($requetecreatemed); 
        $resultatcreatemed->closeCursor();

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

    function getMotif(){
        $connexion=getConnect();

        $requetemed='SELECT * FROM personnel WHERE IDCAT=2';
        $resultatmed=$connexion->query($requetemed); 
        $resultatmed->setFetchMode(PDO::FETCH_OBJ);
        $personnel = $resultatmed->fetch();
        $resultatmed->closeCursor();
    }
?>