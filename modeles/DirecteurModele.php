<?php 
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
    function UpdatePrix($newprix,$RDVcode){
        $connexion=getConnect();

        $requetemodifprix='UPDATE motif SET PRIXMO ="' .$newprix.'" WHERE IDRDV="' .$RDVcode. '"';
       return $resultatmodifprix=$connexion->query($requetemodifprix); 
    }

    function Updatedocument($newpiece,$RDVcode){
        $connexion=getConnect();

        $requetemodifprix='UPDATE personnel SET IDPI ="' .$newpiece.'" WHERE IDRDV="' .$RDVcode. '"';
       return $resultatmodifprix=$connexion->query($requetemodifprix); 
    }

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

        $requetecreatespe='INSERT INTO SPECIALITE (LIBELLESP) VALUES ($specmedecin)
        select * from PERSONNEL NATURAL JOIN SPECIALITE where NOM=$nommedecin AND PRENOM=$prenommedecin';
        $resultatcreatespe=$connexion->query($requetecreatespe); 
        $resultatcreatespe->closeCursor();
    }


?>