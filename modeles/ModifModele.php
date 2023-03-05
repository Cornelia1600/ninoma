<?php 
    function UpdateLogin($newlogin,$oldlogin){
        $connexion=getConnect();

        $requetemodiflogin='UPDATE personnel SET LOGIN ="' .$newlogin.'" WHERE LOGIN="' .$oldlogin. '"';
        $resultatmodiflogin=$connexion->query($requetemodiflogin); 
        $resultatmodiflogin->setFetchMode(PDO::FETCH_OBJ);
        $personnel = $resultatmodiflogin->fetch();
        $resultatmodiflogin->closeCursor();

    }

?>