<?php 
    function UpdateLogin($newlogin,$idperso){
        $connexion=getConnect();

        $requetemodiflogin='UPDATE personnel SET LOGIN ="' .$newlogin.'" WHERE idperso="' .$idperso. '"';
        $resultatmodiflogin=$connexion->query($requetemodiflogin); 
        $resultatmodiflogin->setFetchMode(PDO::FETCH_OBJ);
        $personnel = $resultatmodiflogin->fetch();
        $resultatmodiflogin->closeCursor();

    }

?>