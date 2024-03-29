<?php
    function formatDateNais($date){
        $dateTime = new DateTime($date); 
        return $dateTime->format('Y-m-d');
    }

	function creerPatient($nss, $nom,$adresse,$prenom,$tlf,$dept,$pays, $datenais){
		$connexion=getConnect();
		$requete= 'INSERT INTO client (PRENOMCL, NOMCL, NUMTELCL, ADRESSECL, DEPARTNAISSCL, PAYSNAISSCL, NSS, DATENAISSCL) 
		VALUES ("'. $prenom . '", "' . $nom . '", "' . $tlf . '","' . $adresse . '", ' . $dept . ',"' . $pays . '", "' . $nss . '", "' . formatDateNais($datenais) .'")';
		return $connexion->query($requete);
	}

	
	function modifierPatient($id, $nss, $nom,$adresse,$prenom,$tlf,$dept,$pays,$datenais){
		$connexion=getConnect();
		$requete= 'UPDATE client SET NSS="'. $nss .'", NOMCL="' . $nom . '", PRENOMCL="' . $prenom . '", NUMTELCL="' . $tlf . '", ADRESSECL="' . $adresse . '", DEPARTNAISSCL="' . $dept . '", PAYSNAISSCL="' . $pays . '", DATENAISSCL="' . formatDateNais($datenais) . '" WHERE IDCL='. $id;
		return $connexion->query($requete);
	}
		
	function getPatientById($id){
		$connexion=getConnect();
		
		$requete = 'SELECT * FROM client WHERE IDCL="'. $id . '"';
        $resultat=$connexion->query($requete); 
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        $patient = $resultat->fetch();
        $resultat->closeCursor();

		return $patient;
	}
	
	function getPatientByNSS($nss){
		$connexion=getConnect();
		
		$requete = 'SELECT * FROM client WHERE NSS="'. $nss . '"';
        $resultat=$connexion->query($requete); 
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        $patient = $resultat->fetch();
        $resultat->closeCursor();

		return $patient;
	}

	function getNSS($nomCL, $datenaiss){
		$connexion=getConnect();
				
		$requete = 'SELECT NSS FROM client WHERE NOMCL="'. $nomCL . '" AND DATENAISSCL="' . formatDateNais($datenaiss) . '"';
        $resultat=$connexion->query($requete); 
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        $nss = $resultat->fetch();
        $resultat->closeCursor();

		return $nss;
	}

	function ajouterSolde($idcl, $montant){
		$connexion=getConnect();
		$patient = getPatientById($idcl);

		$soldeApresDepot= $patient->SOLDE + $montant;
		$requete= 'UPDATE client SET SOLDE='.$soldeApresDepot . ' WHERE IDCL='. $idcl;
		return $connexion->query($requete);

	}


	function payer($prix, $solde){
		$connexion=getConnect();

		$soldeApresPayement=$solde -$prix ;
		$requete= 'INSERT INTO client (SOLDE) 
		VALUES ("'. $soldeApresPayement . '")';
		return $connexion->query($requete);

	}
	

?>