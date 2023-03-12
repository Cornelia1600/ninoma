<?php

    function afficherFormCreationPatient($errors_message = ""){
        //TODO afficher les errors message s'il y en a
        return '<form id="formu" method="POST">
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
				<input type="text" id="numtel" name="numtel" onBlur="verif()" />
                <span id="error_tlf"></span>
			</p>
			
			
			<p>
				<label for="datenais">Date de naissance</label>
				<input type="date" id="datenais" name="datenais" />
			</p>
			
			<p>
				<label for="dptnais">Département de naissance</label>
				<input type="text" id="dptnais" name="dptnais" placeholder="99 pour l\'étranger" required  onBlur=pays(); />
			</p>
			
			<p id="paysnaiscontainer" style="display:none;">
				<label for="paysnais">Pays de naissance</label>
				<input type="text" id="paysnais" name="paysnais"/>
			</p>

			<p>
				<label for="nss">Numéro de sécurité sociale</label>
				<input type="text" id="nss" name="nss" />
			</p>
			
			<p>
			    <button type="submit" name="ajouterPatient"/>Ajouter patient</button>
			</p>
			
            </fieldset>
            </form>
            <script src="./scripts/creationPatient.js"></script>'; 
			// <p>
			//     <input type="button" value="Synthèse Patient" name="synthesePatient" />
			//     <input type="button" value="Consulter compte patient" name="payer" />
			// </p>
    }

?>