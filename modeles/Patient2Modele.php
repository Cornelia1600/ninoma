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


?>