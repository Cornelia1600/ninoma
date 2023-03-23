<?php 
    // Catégories
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

    // Personnels
    function getPersonnelByUsername($name, $mdp){
        $connexion=getConnect();

        $requetelogin='SELECT * FROM personnel WHERE LOGIN="' . $name . '"AND MDP="' . $mdp. '"';
        $resultatlogin=$connexion->query($requetelogin); 
        $resultatlogin->setFetchMode(PDO::FETCH_OBJ);
        $personnel = $resultatlogin->fetch();
        $resultatlogin->closeCursor();

        return $personnel;
    }

    function getPersonnelByid($id){
        $connexion=getConnect();

        $requetelogin='SELECT * FROM personnel WHERE IDPERS="' . $id .'"';
        $resultatlogin=$connexion->query($requetelogin); 
        $resultatlogin->setFetchMode(PDO::FETCH_OBJ);
        $personnel = $resultatlogin->fetch();
        $resultatlogin->closeCursor();

        return $personnel;
    }
    
    function getAllPersonnel(){
        $connexion=getConnect();

        $requetepers='SELECT * FROM personnel';
        $resultatpers=$connexion->query($requetepers); 
        $resultatpers->setFetchMode(PDO::FETCH_OBJ);
        $personnels = $resultatpers->fetchAll();
        $resultatpers->closeCursor();

        return $personnels;
    }

        
    function Createlogin($prenom,$nom,$login,$MDP,$Cat){
		$connexion=getConnect();

		$requetecreatelogin= 'INSERT INTO PERSONNEL(PRENOM,NOM,LOGIN,MDP,IDCAT)
        VALUES ("'. $prenom . '", "' . $nom . '", "' . $login . '","' . $MDP . '",' . $Cat . ')';
		return $connexion->query($requetecreatelogin);
	}  
    
    function UpdateAccess($idpersonnel,$prenom,$nom,$login,$MDP, $idcategorie){
        $connexion=getConnect();

        $requetemodiflogin='UPDATE personnel SET IDCAT=' .$idcategorie.', NOM="' . $nom .'", PRENOM="' .$prenom.'", LOGIN="' . $login .'", MDP="' .$MDP . '" WHERE IDPERS='. $idpersonnel;
       return $resultatmodiflogin=$connexion->query($requetemodiflogin); 
    }

    // Médecins
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

    function getAllMedecinswithspecialite(){
        $connexion=getConnect();

        $requeteMedecins='SELECT * FROM personnel natural join specialite where IDCAT=2';
        $resultatMedecins=$connexion->query($requeteMedecins); 
        $resultatMedecins->setFetchMode(PDO::FETCH_OBJ);
        $Medecins = $resultatMedecins->fetchAll();
        $resultatMedecins->closeCursor();

        return $Medecins;
    }

    function DeleteMedecin($idmeds){
        $connexion=getConnect();

        $requetedeletemed='DELETE from PERSONNEL WHERE IDPERS="'.$idmeds.'"';
        return $connexion->query($requetedeletemed); 
    }

    function CreateMedecin($nommedecin,$prenommedecin, $idspemedecin){
        $connexion=getConnect();

        $requetecreatemed='INSERT INTO personnel(NOM,PRENOM,IDSP,IDCAT) VALUES ("'.$nommedecin.'","'.$prenommedecin.'", ' . $idspemedecin .', 2)' ;
		return $connexion->query($requetecreatemed);

    }

?>