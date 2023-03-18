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

	}
}			/////POURQUOI ON FAIT LES CONTROLES DANS LA VUE? QUESTION DE NIKI / C'est ma faute -_- : Nour 

		
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