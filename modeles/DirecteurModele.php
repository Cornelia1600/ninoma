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

        $requetemodifMDP='UPDATE personnel SET IDMO ="' .$newmo.'" WHERE IDRDV="' .$RDVcode. '"';
       return $resultatmodifMDP=$connexion->query($requetemodifMDP); 
    }




?>