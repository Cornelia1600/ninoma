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

    function CreateMedecin($nommedecin,$prenommedecin,$specmedecin){
        $connexion=getConnect();

        $requetecreatemed='INSERT INTO PERSONNEL * FROM motif';
        $resultatcreatemed=$connexion->query($requetecreatemed); 
        $resultatcreatemed->closeCursor();

    }


?>