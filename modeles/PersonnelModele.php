<?php 
    function getPersonnelByUsername($name, $mdp){
        $connexion=getConnect();

        $requetelogin='SELECT * FROM personnel WHERE LOGIN="' . $name . '"AND MDP="' . $mdp. '"';
        $resultatlogin=$connexion->query($requetelogin); 
        $resultatlogin->setFetchMode(PDO::FETCH_OBJ);
        $personnel = $resultatlogin->fetch();
        $resultatlogin->closeCursor();

        return $personnel;
    }


    function getCategorieById($id){
        $connexion=getConnect();

        $requetecategorie='SELECT * FROM categorie WHERE IDCAT="' . $id . '"';
        $resultatcategorie=$connexion->query($requetecategorie); 
        $resultatcategorie->setFetchMode(PDO::FETCH_OBJ);
        $categorie = $resultatcategorie->fetch();
        $resultatcategorie->closeCursor();

        return $categorie;    
    }
?>