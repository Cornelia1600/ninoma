<?php 

function afficherSynthese(){
	if(isset($_POST['synthesePatient'])) {
		echo '<form id="f"><fieldset><legend>Synthése patient</legend>
		
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
	}
}
		?>