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

?>