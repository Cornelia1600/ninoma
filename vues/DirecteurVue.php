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

<<<<<<< Updated upstream
function afficherGestionAccess($errors_message = "", $titre,$Personnel, $cat){
=======
function afficherAjoutAccess($errors_message = ""){
>>>>>>> Stashed changes
        //afficher les errors message s'il y en a
        $contenu = '<form id="formu" method="POST"><fieldset><legend>Ajouter Acces</legend>';

		if (strlen($errors_message) > 0) {
			$contenu.= '<div>'. $errors_message . '</div>';
		}
			if($titre == "Modification"){
				$contenu.='<form action= method="POST">
				<table>
				<th>Prénom Personnel</th>
				<th>Nom Personnel</th>
				<th>Login</th>
				<th>MDP</th>';

				for ($i=0; $i < count($Personnel) ; $i++){
					$contenu.=
					'<tr>
					<td>"'. $Medecins[$i]->PRENOM .'"</td>
					<td>"'. $Medecins[$i]->NOM .'"</td>
					<td>"'. $Medecins[$i]->LOGIN .'"</td>
					<td>"'. $Medecins[$i]->MDP .'"</td>
					<button type="submit" value="' . $Medecins->IDPERS . '" name="modification_access">Modifier Acces</button></tr>';	
				}
					$contenu.='</table></form>';
			}
			else { 
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
<<<<<<< Updated upstream
				</p>';
					for ($i=0; $i < count($cat) ; $i++) { 
						// Pour chaque spécialité, on crée une option dans la liste
						$contenu.='<option value="' . $cat[$i]->IDCAT .'"';// la valeur renvoyée = IDCategorie

                		if(isset($_POST["specialite"]) && $_POST["specialite"] == $specialites[$i]->IDCAT) {
                    	$contenu.=' selected="selected"'; 
                		}
                		$contenu.='>'. $specialites[$i]->LIBELLECAT .'</option>'; // La valeur à afficher = libellé
            		}
					$contenu.='</select>
					</p>
					<p>
			    	<button type="submit" name="ajouter_acces"/>Ajouter Acces</button>
					</p></fieldset>
					</form>';
	
			}
			
=======
			</p>

			<p>Categorie de personnel </br><select name="categorie">';
			$idmed=2;
			$idagent=1;
			$iddir=3;
			$contenu.='<option value=."'.$idmed.'">Médecin<option/>
			<option value=."'.$iddir.'">Directeur<option/>
			<option value=."'.$idagent.'">Agent Acceuil<option/>
			</select>
			</p>
			<p>
			<button type="submit" name="ajout_acces"/>Ajouter Acces</button>
			</p></fieldset>
            </form>';
>>>>>>> Stashed changes
			return $contenu;

			}


	function afficherModificationAccess($personnel){
        
        $contenu = '<form id="formu" method="POST"><fieldset><legend>Modifier Access</legend>
			<form action= method="POST">
			<table>
			<th>Prénom Personnel</th>
			<th>Nom Personnel</th>';

				for ($i=0; $i < count($personnel) ; $i++){
					$contenu.=
					'<tr>
					<td>"'. $$personnel[$i]->PRENOM .'"</td>
					<td>"'. $$personnel[$i]->NOM .'"</td>
					<td><button type="submit" value="' . $personnel[$i]->IDPERS . '" name="changer_access">Modification Access</button></td></tr>';	
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
<<<<<<< Updated upstream
					<button type="submit" value="' . $Medecins[$i]->IDPERS . '" name="supprime_medecin">Supprimer Médecin</button></tr>';	
=======
					<td><button type="submit" value="' . $Medecins[$i]->IDPERS . '" name="supprime_medecin">Supprimer Médecin</button></td></tr>';	
>>>>>>> Stashed changes
				}
			$contenu.='</table></form>
			</fieldset>
			</form>';
			return $contenu;
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