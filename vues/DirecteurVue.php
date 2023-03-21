<?php

function afficherPageDirecteur(){
    $form = '
	<form id="directeur_form" method="post">
        <fieldset> 
        <legend> Création, Suppression ou Modification </legend>
    <p>
        <label for="acces">Login ou MDP</label>		
		<input type="submit" Value="Ajouter Acces" name="ajout_acces"/>
        <input type="submit" Value="Modifier Acces" name="modif_acces"/>
    </p>
    <p>
        <label for="acces">Rendez-vous</label>		
        <input type="submit" Value="Motif" name="modif_motif"/>
        <input type="submit" Value="Prix" name="modif_prix"/>
        <input type="submit" Value="Pièce" name="modif_piece"/>
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

function afficherGestionAccess($errors_message = "", $titre){
        //afficher les errors message s'il y en a
        $contenu = '<form id="formu" method="POST"><fieldset><legend>' . $titre . ' Acces</legend>';

		if (strlen($errors_message) > 0) {
			$contenu.= '<div>'. $errors_message . '</div>';
		}

		$contenu.='<p>
				<label for="nom">Nom Personnel</label>
				<input type="text" id="nom" name="nom"/>
			</p>
			<p>
				<label for="prenom">Prénom Personnel</label>
				<input type="text" id="prenom" name="prenom" />
			</p>
			
			<p>
				<label for="login">login</label>
				<input type="text" id="login" name="login" />
			</p>
			
			<p>
				<label for="MDP">MDP</label>
				<input type="text" id="MDP" name="MDP"/>
			</p>';
			
				
				if($titre == "Modification"){
						$contenu.='<form action= method="POST">
						<table>
						<th>Prénom Médecin</th>
						<th>Nom Médecin</th>
						<th>Spécialité Médecin</th>';
		
						for ($i=0; $i < count($Medecins) ; $i++){
							$contenu.=
							'<tr>
							<td>"'. $Medecins[$i]->PRENOM .'"</td>
							<td>"'. $Medecins[$i]->NOM .'"</td>
							<td>"'. $Medecins[$i]->SPECIALITE .'"</td>
							<button type="submit" value="' . $Medecins->IDPERS . '" name="delete_medecin">Supprimer Médecin</button></tr>';	
						}
						$contenu.='</table></form>';
				}
				else { 
					$contenu.='
					<p>Categorie de personnel </br>
					<select name="categorie">
					<option value="medecin">Médecin<option/>
					<option value="directeur">Directeur<option/>
					<option value="agent">Agent Acceuil<option/>
					</select>
					</p>
					<p>
			    	<button type="submit" name="ajouter_acces"/>Ajouter Acces</button>
					</p>';
				}

			$contenu.='
            </fieldset>
            </form>';

			return $contenu;
    }  

	function afficherGestionMedecin($errors_message = "", $titre,$Medecins, $specialites){
        //afficher les errors message s'il y en a
        $contenu = '<form id="formu" method="POST"><fieldset><legend>' . $titre . ' Médecin</legend>';

		if (strlen($errors_message) > 0) {
			$contenu.= '<div>'. $errors_message . '</div>';
		}			
			if($titre == "Suppression"){
				$contenu.='<form action= method="POST">
				<table>
				<th>Prénom Médecin</th>
				<th>Nom Médecin</th>
				<th>Spécialité Médecin</th>';

				for ($i=0; $i < count($Medecins) ; $i++){
					$contenu.=
					'<tr>
					<td>"'. $Medecins[$i]->PRENOM .'"</td>
					<td>"'. $Medecins[$i]->NOM .'"</td>
					<td>"'. $Medecins[$i]->SPECIALITE .'"</td>
					<button type="submit" value="' . $Medecins->IDPERS . '" name="delete_medecin">Supprimer Médecin</button></tr>';	
				}
				$contenu.='</table></form>';
				}
				else { 
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

				return $contenu;}
    			 
	}		


function afficherGestionMotif($errors_message = "", $titre, $motifs ){
    $contenu = '<h3>Modification Motif</h3><div><table>';
                
    for ($i=0; $i < count($motifs) ; $i++) { 
        // Pour chaque motif, on recrée la table avec les buttons
        ///$button = '<form method="post"><input type="hidden"'
        $contenu.='<tr><td>'.$motifs[$i]->IDMO.'</td><td>'.$motifs[$i]->LIBELLEMO.'</td></tr>'; 
    }
    
    $contenu.= '</table></div>';  
    return $contenu;  
}



?>