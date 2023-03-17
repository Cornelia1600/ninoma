<?php

function afficherPageDirecteur(){
    $form = '
	<form id="directeur_form" method="post">
        <fieldset> 
        <legend> Création, Suppression ou Modification </legend>
    <p>
        <label for="acces">Login ou MDP</label>		
        <input type="submit" Value="Créer Acces" name="creation_acces"/>
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
        <input type="submit" Value="Supprimer" name="delete_medecin"/>
        <input type="submit" Value="Ajouter" name="ajout_medecin"/>
    </p>
  
    </fieldset>
    </form>';

    return $form;
}

function afficherGestionAccess($errors_message = "", $personnel = null){
        //afficher les errors message s'il y en a

		if (isset($personnel->IDPERS)) {
			$titre = "Modification";
		}else {
			$titre = "Création";
		}
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
					$contenu.='<p>
					<label for="newlogin">Nouveau login</label>
					<input type="text" id="newlogin" name="newlogin" />
					</p>
					<p>
					<label for="newMDP">Nouveau MDP</label>
					<input type="text" id="newMDP" name="newMDP"/>
					</p>
					<p>
			    	<button type="submit" name="changer_acces"/>Modifier Acces</button>
					</p>';
				}
				else { 
					$contenu.='<p>
			    	<button type="submit" name="ajouter_acces"/>Ajouter Acces</button>
					</p>';
				}

			$contenu.='
            </fieldset>
            </form>';

			return $contenu;
    }  

	function afficherRechercheAccess($errors_message = "", $personnel = null){
        //afficher les errors message s'il y en a

		if (isset($personnel->IDPERS)) {
			$titre = "Modification";
		}else {
			$titre = "Création";
		}
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
			</p>
			<p>
				<label for="newlogin">Nouveau login</label>
				<input type="text" id="newlogin" name="newlogin" />
			</p>
		
			<p>
				<label for="newMDP">Nouveau MDP</label>
				<input type="text" id="newMDP" name="newMDP"/>
			</p>
			<p>
			    <button type="submit" name="ajouter_acces"/>Ajouter Acces</button>
			</p>
            </fieldset>
            </form>';

			return $contenu;
    }  

function afficherModificationMotif($motifs){
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