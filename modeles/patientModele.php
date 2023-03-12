<?php
function creerPatient($nss, $nom,$prenom,$tlf,$dept,$pays){
	$nss=$_POST['nss'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$tlf=$_POST['numtel'];
	$dept=$_POST['dptnais'];
	$pays=$_POST['dptnais'];
	$requete= "INSERT INTO client (PRENOM, NOMCL, NUMTELCL, ADRESSECL, DEPARTNAISSCL, NSS) VALUES ('$nmr', '$nom', '$prenom', '$tlf', '$date', '$nss')";
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
	echo "<p>L'utilisateur ". $prenom . " " . $nom . " a été créé avec succès</p>";
}


?>