<?php 
    function UpdateLogin($newlogin,$idperso){
        $connexion=getConnect();

        $requetemodiflogin='UPDATE personnel SET LOGIN ="' .$newlogin.'" WHERE idperso="' .$idperso. '"';
       return $resultatmodiflogin=$connexion->query($requetemodiflogin); 
    }

    function UpdateMDP($newMDP,$idperso){
        $connexion=getConnect();

        $requetemodifMDP='UPDATE personnel SET LOGIN ="' .$newlogin.'" WHERE idperso="' .$idperso. '"';
       return $resultatmodifMDP=$connexion->query($requetemodifMDP); 
    }
?>