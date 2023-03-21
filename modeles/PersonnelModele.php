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

    function getAllCategories(){
        $connexion=getConnect();

        $requetecategorie='SELECT * FROM categorie';
        $resultatcategorie=$connexion->query($requetecategorie); 
        $resultatcategorie->setFetchMode(PDO::FETCH_OBJ);
        $categories = $resultatcategorie->fetchAll();
        $resultatcategorie->closeCursor();

        return $categories;    
    }

    function getMedecinBySpecialite($idspecialite){
        $connexion=getConnect();

        $requeteMedecin='SELECT * FROM personnel WHERE IDSP='. $idspecialite;
        $resultatMedecin=$connexion->query($requeteMedecin); 
        $resultatMedecin->setFetchMode(PDO::FETCH_OBJ);
        $medecins = $resultatMedecin->fetchAll();
        $resultatMedecin->closeCursor();

        return $medecins;
    }

    function getMedecinById($id){
        $connexion=getConnect();

        $requete='SELECT * FROM personnel WHERE IDPERS="' . $id . '"';
        $resultat=$connexion->query($requete); 
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        $medecin = $resultat->fetch();
        $resultat->closeCursor();

        return $medecin;    
    }
?>