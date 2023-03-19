<?php
    function formatDateNais($date){
        $dateTime = new DateTime($date); 
        return $dateTime->format('Y-m-d');
    }

	function creerPatient($nss, $nom,$adresse,$prenom,$tlf,$dept,$pays, $datenais){
		$connexion=getConnect();
		$requete= 'INSERT INTO client (PRENOMCL, NOMCL, NUMTELCL, ADRESSECL, DEPARTNAISSCL, PAYSNAISSCL, NSS, DATENAISSCL) 
		VALUES ("'. $prenom . '", "' . $nom . '", "' . $tlf . '","' . $adresse . '", ' . $dept . ',"' . $pays . '", "' . $nss . '", "' . formatDateNais($datenais) .'")';
		echo $requete;
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

	function getNSS($nomCL, $datenaissCL){
		$connexion=getConnect();
		
		$requete = 'SELECT NSS FROM client WHERE NOMCL="'. $nomCL . '"';
        $resultat=$connexion->query($requete); 
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        $ss = $resultat->fetch();
        $resultat->closeCursor();

		return $ss;
	}

	

?>