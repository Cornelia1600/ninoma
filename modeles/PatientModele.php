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

	

?>