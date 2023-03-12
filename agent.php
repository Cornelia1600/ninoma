<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Exo14</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 		<link rel="stylesheet" type="text/css" href="ex14.css" /> 
		
 <script type="text/javascript">
	function pays(){
		ch='';
		ch='<p>Pays de naissance <input type="text"/><p/>';
		
		document.getElementById('formu').innerHTML=ch;
	}
	
	function verif(){
	var tlf=document.forms['formu'].elements['numtel'].value;
		if ( Pattern.matches("[a-zA-Z]+", tlf)  ){
		document.write("Numéro de téléphone incorrecte");
		
		
		}
	}

	
	
	
 </script> 
 
    </head>

<body>

<?php 

		
		echo'<form id="formu">
		<fieldset>
			<legend>Patient</legend>
			<p>
				<label for="nom">Nom Patient</label>
				<input type="text" id="nom" name="nom" />
			</p>
			<p>
				<label for="prenom">Prénom Patient</label>
				<input type="text" id="prenom" name="prenom" />
			</p>
			
			<p>
				<label for="adresse">Adresse</label>
				<input type="text" id="adresse" name="adresse" />
			</p>
			
			<p>
				<label for="numtel">Numéro de téléphone</label>
				<input type="text" id="numtel" name="numtel" onblur=verif(); />
			</p>
			
			
			<p>
				<label for="datenais">Date de naissance</label>
				<input type="date" id="datenais" name="datenais" />
			</p>
			
			<p>
				<label for="dptnais">Département de naissance</label>
				<input type="text" id="dptnais" placeholder="99 pour létranger" required  onBlur=pays(); />
		
			</p>
			
			<p>
				<label for="nss">Numéro de sécurité sociale</label>
				<input type="text" id="nss" />
		
			</p>
			
			<p>
			<input type="button" value="Ajouter patient"  onclick="verification()" />
			</p>
			
		</fieldset>
		</form>'; 

	
		try{
		
		if(isset($_POST['Ajouter Patient'])) {
			$errors_message ='';
		
			if(empty($_POST['date']) ||$_POST['date'] > date("Y-m-d")){
				$errors_message=$errors_message.'<p> Retapez votre date de naissance</p>';
			}
			if(empty($_POST['nom']) ||  strlen($_POST['nom']) == 0){
				$errors_message=$errors_message.'<p> Retapez votre nom</p>';
			}
			if(empty($_POST['prenom']) || strlen($_POST['prenom']) == 0){
				$errors_message=$errors_message.'<p> Retapez votre prénom</p>';
			}
			if(empty($_POST['nss']) || strlen(strval($_POST['nss']))!=13) {
				$errors_message=$errors_message.'<p> Retapez votre numéro de sécurité sociale</p>';
			}
			if(empty($_POST['numtel']) || strlen(strval($_POST['numtel']))!=10){
				$errors_message=$errors_message.'<p> Retapez votre numéro de téléphone</p>';
			}
			
			if(strlen($errors_message) > 0){
				echo $errors_message;
			}
			else{
				$nss=$_POST['nss'];
				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$tlf=$_POST['numtel'];
				$dept=$_POST['dptnais'];
				$pays=$_POST['dptnais'];
				$requete= "INSERT INTO client (PRENOM, NOMCL, NUMTELCL, ADRESSECL, DEPARTNAISSCL, NSS) VALUES ('$nmr', '$nom', '$prenom', '$tlf', '$date')";
				$resultat=$connexion->query($requete);
				$resultat->closeCursor();
				echo "<p>L'utilisateur ". $prenom . " " . $nom . " a été créé avec succès</p>";
			}
		}
    }		
		
	catch(Exception $e){
		$msg='ERREUR dans '.$e->getFile().'Ligne'.$e->getLine().':'.$e->getMessage();
		exit($msg);
	}
					
	
		
	?>	
		
		<?php 
		echo'<form id="f"><fieldset><legend>Synthése patient</legend>
		
		<p><label> Numéro de sécurité sociale : </label><input type="text" name="nmr" /></p>
		<p>ou</p>
		<p><label> Nom patient : </label><input type="text" id="nom" name="nom" /></p>
		<p><label> Date de naissance : </label><input type="date" id="datenais" name="datenais" /></p>
		
		<p>
		<input type="button" value="synthèse patient"  />
		</p>
	
		</fieldset></form>';


		try{
		
			if(isset($_POST['Ajouter patient'])) {
				$errors_message ='';
			
				if(empty($_POST['date']) ||$_POST['date'] > date("Y-m-d")){
					$errors_message=$errors_message.'<p> Retapez votre date de naissance</p>';
				}
				if(empty($_POST['nom']) ||  strlen($_POST['nom']) == 0){
					$errors_message=$errors_message.'<p> Retapez votre nom</p>';
				}
				if(empty($_POST['prenom']) || strlen($_POST['prenom']) == 0){
					$errors_message=$errors_message.'<p> Retapez votre prénom</p>';
				}
				if(empty($_POST['nmr']) || strlen(strval($_POST['nmr']))!=13) {
					$errors_message=$errors_message.'<p> Retapez votre numéro de sécurité sociale</p>';
				}
				if(empty($_POST['tlf']) || strlen(strval($_POST['tlf']))!=10){
					$errors_message=$errors_message.'<p> Retapez votre numéro de téléphone</p>';
				}
				
				if(strlen($errors_message) > 0){
					echo $errors_message;
				}else{
					$nmr=$_POST['nmr'];
					$nom=$_POST['nom'];
					$prenom=$_POST['prenom'];
					$tlf=$_POST['tlf'];
					$date=$_POST['date'];
					$requete= "INSERT INTO patient (nss, nom, prenom, numtel, datenais) VALUES ('$nmr', '$nom', '$prenom', '$tlf', '$date')";
					$resultat=$connexion->query($requete);
					$resultat->closeCursor();
					echo "<p>L'utilisateur ". $prenom . " " . $nom . " a été créé avec succès</p>";
				}
			}		
		}	
		
				
		catch(Exception $e){
			$msg='ERREUR dans '.$e->getFile().'Ligne'.$e->getLine().':'.$e->getMessage();
			exit($msg);
		}

		
			
		if (isset($_POST['find_specialite'])) {
			$NSS= $_POST['specialite'];
			$requeteMedecin = "SELECT * FROM client WHERE idspecialite=" . $id_specialite;
			$resultatMedecin=$connexion->query($requeteMedecin); 
			$resultatMedecin->setFetchMode(PDO::FETCH_OBJ);

			echo "<h2>Choisir un medecin</h2>
				<form action='site.php?menu=rendezvous' method='POST'><table>";
			while($medecin = $resultatMedecin->fetch()){
				echo "<tr>
					<td>". $medecin->nommedecin ."</td>
					<td><button type='submit' name='select_date_rdv' value='". $medecin->idmed . "'>Prendre rdv</button></td>
				</tr>";
			}
			echo "</table>
			</form>";
			
		}
		
		
		?>
		
		
		<?php 
		echo'<form id="f"><fieldset><legend>Compte interne patient</legend>
		<p>Pour le dépôt : </p>
		<p><label> Numéro de sécurité sociale : </label><input type="text" name="nmr" /></p>
		<p>ou</p>
		<p><label> Montant souhaité : </label><input type="text" id="nom" name="nom" /></p>
		
		
		<p>
		<input type="button" value="Dépôt"  />
		</p>
	
		</fieldset></form>';
		
		
		?>
		

		
		
		
</body>	
		

		
		
		
</body>	