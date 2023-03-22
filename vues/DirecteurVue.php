<?php

	function afficherPageDirecteur(){
		$form = '
		<form id="directeur_form" method="post">
			<fieldset> 
			<legend> Création, Suppression ou Modification </legend>
		<p>
			<label for="acces">Login ou MDP</label>		
			<input type="submit" Value="Ajouter Acces" name="ajout_acces"/>
			<input type="submit" Value="Modifier Acces" name="tableau_modif_acces"/>
		</p>
		<p>
			<label for="acces">Rendez-vous</label>		
			<input type="submit" value="Ajouter Motif" name="ajout_motif"/>
			<input type="submit" value="Modifier Motif" name="modif_motif"/>
			<input type="submit" value="Supprimer Motif" name="modif_motif"/>
		</p>
		<p>
			<label for="acces">Medecin</label>
			<input type="submit" Value="Ajouter" name="ajout_medecin"/>		
			<input type="submit" Value="Supprimer" name="delete_medecin"/>
			
		</p>
	
		</fieldset>
		</form>';

		return $form;
	}

	function afficherformulaireAccess($errors_message = "", $cat, $personnel = null){
		if (isset($personnel->IDPERS)) {
			$titre = "Modification";
			$modif = true;
		}else {
			$titre = "Ajout";
			$modif = false;
		}
			$contenu = '<form id="formu" method="POST"><fieldset><legend>'.$titre.' Accès</legend>';

			if (strlen($errors_message) > 0) {
				$contenu.= '<div>'. $errors_message . '</div>';
			}
			else{
				$contenu.='<p>
				<label for="nom">Nom Personnel</label>
				<input type="text" id="nom" name="nom" value="';
				
				if ($modif) {
					$contenu .= $personnel->NOM;
				}

				$contenu.='"/></p>
				<p>
				<label for="prenom">Prénom Personnel</label>
				<input type="text" id="prenom" name="prenom" value="';
				if ($modif) {
					$contenu .= $personnel->PRENOM;
				}
				$contenu.='"/></p>
			
				<p>
				<label for="login">login</label>
				<input type="text" id="login" name="login" value="';
				
				if ($modif) {
					$contenu .= $personnel->LOGIN;
				}
				$contenu.='"/></p>
			
				<p>
				<label for="MDP">MDP</label>
				<input type="text" id="MDP" name="MDP" value="';

				if ($modif) {
					$contenu .= $personnel->MDP;
				}

				$contenu.='"/></p>

				<p>
				<label for="Categorie">Categorie de Personnel </label>
				<select name="Categorie" required> 
				<option value="" selected disabled hidden>-</option>';
				
				if ($modif) {
					$contenu .= $personnel->IDCAT;
				}
		
				for ($i=0; $i < count($cat) ; $i++) { 
					// Pour chaque spécialité, on crée une option dans la liste
					$contenu.='<option value="' . $cat[$i]->IDCAT .'"';// la valeur renvoyée = IDSPE

					if(isset($personnel->IDCAT) && $personnel->IDCAT == $cat[$i]->IDCAT) {
						$contenu.=' selected="selected"'; 
					}
					$contenu.='>'. $cat[$i]->LIBELLECAT .'</option>'; // La valeur à afficher = libellé
				}
				
				$contenu.='</select></p><p>';

				if ($modif) {
					$contenu .= '<button type="submit" name="form_modif_acces" value="' . $personnel->IDPERS . '"/>Modifier Acces</button>';
				} else {
					$contenu .= '<button type="submit" name="ajout_acces"/>Ajouter Acces</button>';
				}

				
				$contenu .= '</p></fieldset>
				</form>';
			return $contenu;

		}		
	}

	function afficherModificationAccess($personnel){
        
        $contenu = '<form id="formu" method="POST"><fieldset><legend>Modifier Access</legend>
			<form action= method="POST">
			<table>
			<th>Prénom Personnel</th>
			<th>Nom Personnel</th>
			<th>Login</th>
			<th>Mot de passe</th>';

				for ($i=0; $i < count($personnel) ; $i++){
					$contenu.=
					'<tr>
					<td>'. $personnel[$i]->PRENOM .'</td>
					<td>'. $personnel[$i]->NOM .'</td>
					<td>'. $personnel[$i]->LOGIN .'</td>
					<td>'. $personnel[$i]->MDP .'</td>
					<td><button type="submit" value="' . $personnel[$i]->IDPERS . '" name="form_modif_acces">Modification Access</button></td></tr>';	
				}
		$contenu.='</table></form>
		</fieldset>
		</form>';
		return $contenu;
	} 


	function afficherAjoutMedecin($errors_message = "", $specialites){
        //afficher les errors message s'il y en a
        $contenu = '<form id="formu" method="POST"><fieldset><legend>Ajouter Médecin</legend>';

		if (strlen($errors_message) > 0) {
			$contenu.= '<div>'. $errors_message . '</div>';
		}			
				$contenu.='<p>
				<label for="nom">Nom Médecin</label>
				<input type="text" id="nom" name="nom"/>
				</p>
				<p>
				<label for="prenom">Prénom Médecin</label>
				<input type="text" id="prenom" name="prenom" />
				</p>
				<div>
				<label for="specialite">Spécialité de Médecin </label>
				<select name="specialite" required> 
				<option value="" selected disabled hidden>-</option>';
		
				for ($i=0; $i < count($specialites) ; $i++) { 
					// Pour chaque spécialité, on crée une option dans la liste
					$contenu.='<option value="' . $specialites[$i]->IDSP .'"';// la valeur renvoyée = IDSPE

					if(isset($_POST["specialite"]) && $_POST["specialite"] == $specialites[$i]->IDSP) {
					$contenu.=' selected="selected"'; 
					}
					$contenu.='>'. $specialites[$i]->LIBELLESP .'</option>'; // La valeur à afficher = libellé
				}
	
		$contenu.= '</select></div>
			<p>
			<button type="submit" name="ajout_medecin"/>Ajouter Medécin</button>
			</p>
		</fieldset>
		</form>';

		return $contenu;
	}
				


	function afficherSuppressionMedecin($Medecins){

        $contenu = '<form id="formu" method="POST"><fieldset><legend>Supprimer Médecin</legend>
			<form action= method="POST">
			<table>
			<th>Prénom Médecin</th>
			<th>Nom Médecin</th>
			<th>Spécialité Médecin</th>';

				for ($i=0; $i < count($Medecins) ; $i++){
					$contenu.=
					'<tr>
					<td>"'. $Medecins[$i]->PRENOM .'"</td>
					<td>"'. $Medecins[$i]->NOM .'"</td>
					<td>"'. $Medecins[$i]->LIBELLESP .'"</td>
					<td><button type="submit" value="' . $Medecins[$i]->IDPERS . '" name="supprime_medecin">Supprimer Médecin</button></td></tr>';	
				}
		$contenu.='</table></form>
		</fieldset>
		</form>';
		return $contenu;
	}
		


	function afficherAjoutMotif($errors_message = "", $consignes, $pieces){
		//afficher les errors message s'il y en a
		$contenu = '<form id="formu" method="POST"><fieldset><legend>Ajouter Motif</legend>';

		if (strlen($errors_message) > 0) {
			$contenu.= '<div>'. $errors_message . '</div>';
		}
		
		$contenu.='<p>
				<label for="libelle">Libelle Motif</label>
				<input type="text" id="libelle" name="libelle"/>
				</p>
				<p>
				<label for="prix">Prix motif</label>
				<input type="number" id="prix" name="prix" />
				</p>
				<div> Consignes : ';
				
		foreach ($consignes as $consigne) {
			$contenu.='<p>
				<input type="checkbox" name="consignes[]" value="'. $consigne->IDCO .'" />
				<label>' . $consigne->LIBELLECO .'</label>
			</p>';
		}

		$contenu.= '</div><div>Pièces : ';						
		foreach ($pieces as $piece) {
			$contenu.='<p>
				<input type="checkbox" name="pieces[]" value="'. $piece->IDPI .'" />
				<label>' . $piece->LIBELLEPI .'</label>
			</p>';
		}
				
		$contenu.='</div><p>
				<button type="submit" name="ajout_motif"/>Ajouter Motif</button>
				</p>
			</fieldset>
			</form>';

			return $contenu;
		}


?>