<?php
function creerPatient($nss, $nom,$adresse,$prenom,$tlf,$dept,$pays){
	$connexion=getConnect();
	// $nss=$_POST['nss'];
	// $nom=$_POST['nom'];
    // $adresse=$_POST['adresse'];
	// $prenom=$_POST['prenom'];
	// $tlf=$_POST['numtel'];
	// $dept=$_POST['dptnais'];
	// $pays=$_POST['dptnais'];
	$requete= "INSERT INTO client (PRENOM, NOMCL, NUMTELCL, ADRESSECL, DEPARTNAISSCL, NSS) VALUES ('$prenom', '$nom', '$tlf','$adresse','$dept','$pays', '$nss')";
	return $connexion->query($requete);
	// echo "<p>L'utilisateur ". $prenom . " " . $nom . " a été créé avec succès</p>";
}


?>