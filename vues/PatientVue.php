<?php

    function afficherFormCreationPatient($errors_message = "", $patient = null, $rdvs = []){


		if (isset($patient->IDCL)) {
			$titre = "Synthèse";
			$modif = true;
		}else {
			$titre = "Créer";
			$modif = false;
		}
        $contenu = '<form id="formu" method="POST"><fieldset><legend>' . $titre . ' Patient</legend>';

		if (strlen($errors_message) > 0) {
			$contenu.= '<div class="error">'. $errors_message . '</div>';
		}

		$contenu.='<p>
				<label for="nom">Nom Patient</label>
				<input type="text" id="nom" name="nom" value="';
				
		if ($modif) {
			$contenu .= $patient->NOMCL;
		}
				
		$contenu .= '"/>
			</p>
			<p>
				<label for="prenom">Prénom Patient</label>
				<input type="text" id="prenom" name="prenom" value="';
				
			if ($modif) {
				$contenu.= $patient->PRENOMCL;
			}
				
			$contenu.='"/>
			</p>
			
			<p>
				<label for="adresse">Adresse</label>
				<input type="text" id="adresse" name="adresse" value="';
				
				if ($modif) {
					$contenu.= $patient->ADRESSECL;
				}
					
				$contenu.='" />
			</p>
			
			<p>
				<label for="numtel">Numéro de téléphone</label>
				<input type="text" id="numtel" name="numtel" onBlur="verif()" value="';
				
				if ($modif) {
					$contenu.= $patient->NUMTELCL;
				}
					
				$contenu.='" /><span id="error_tlf"></span>
			</p>
			
			
			<p>
				<label for="datenais">Date de naissance</label>
				<input type="date" id="datenais" name="datenais"  value="';
				
				if ($modif) {
					$contenu.= date_format(new DateTime($patient->DATENAISSCL), "Y-m-d");
				}
					
				$contenu.='"/>
			</p>
			
			<p>
				<label for="dptnais">Département de naissance</label>
				<input type="text" id="dptnais" name="dptnais" placeholder="99 pour l\'étranger" required  onBlur=pays();  value="';
				
				if ($modif) {
					$contenu.= $patient->DEPARTNAISSCL;
				}
					
				$contenu.='"/>
			</p>
			
			<p id="paysnaiscontainer" style="'; 
			
			if (!$modif || intval($patient->DEPARTNAISSCL) != 99) {
				$contenu .= "display:none"; 
			}
			
			$contenu .= '">
				<label for="paysnais">Pays de naissance</label>
				<input type="text" id="paysnais" name="paysnais"  value="';
				
				if ($modif) {
					$contenu.= $patient->PAYSNAISSCL;
				}
					
				$contenu.='"/>
			</p>

			<p>
				<label for="nss">Numéro de sécurité sociale</label>
				<input type="text" id="nss" name="nss" value="';
				
				if ($modif) {
					$contenu.= $patient->NSS;
				}
					
				$contenu.='"/>
			</p>';

			if ($modif) {
				$contenu.= '<p> Solde : ' . $patient->SOLDE.'€</p>
				<form method="POST">
					<input type="number" min="1" name="solde_a_ajouter"/>	
					<button type="submit" name="ajouter_solde" value="' . $patient->IDCL .'">Ajouter le solde</button>	
				</form>
				';


				if(count($rdvs) > 0){ 
					$contenu .= '
					<form method="POST"><table>

						<thead>
							<tr>
								<th>Médecin</th>
								<th>Date</th>
								<th>Prix</th>
								<th>Paiement</th>
							</tr>
						</thead>
						<tbody>';

					foreach ($rdvs as $rdv) {
						$contenu.='
							<tr>
								<td> Dr ' . $rdv->NOM . '</td>
								<td>' .  date_format(new DateTime($rdv->DATERDV), "d/m/Y h:m") .'</td>
								<td>' . $rdv->PRIXMO . '€</td>
								<td>';
						if ($rdv->ETATRDV=="PENDING") {
							$contenu.='
								<button type="submit" name="payer_rdv" value="' . $rdv->IDRDV .'">Payer ce rdv</button>
							';
						} else {
							$contenu .= 'Payé';
						}
							
						$contenu.='</td></tr>
						
						';
					}

					$contenu.='</tbody></table></form>';
				}
			}
			$contenu.='<p>';
			if ($modif) {
				$contenu.= '
				<button type="submit" name="modifier_patient" value="'. $patient->IDCL . '"/>Modifier patient</button>
				<button type="submit" name="prendre_rdv" value="'. $patient->IDCL . '"/>Prendre rdv</button>	
			';
			} else {
				$contenu.= '<button type="submit" name="ajouter_patient"/>Ajouter patient</button>';
			}
			$contenu .='</p>';
			if ($modif) {
				$contenu .= '<button type="submit" name="retour_accueil">Créer un nouveau patient</button>';
			}
			
            $contenu.='</fieldset></form><script src="./scripts/creationPatient.js"></script>'; 
			return $contenu;
    }

	function afficherFormRecherchePatient($errors_message = ""){
		
		$contenu = '<form method="POST"><fieldset><legend>Rechercher Patient</legend>';
		if (strlen($errors_message) > 0) {
			$contenu.= '<div class="error">'. $errors_message . '</div>';
		}

		$contenu .= '
		<p>
			<label> Numéro de sécurité sociale : </label>
			<input type="text" name="nss" />
			<button type="submit" name="rechercher_patient"/>Recherche patient</button>
		</p>	
		</fieldset></form>';

		return $contenu;
	}

	function afficherFormNSS($errors_message = "", $nss = ""){
		$contenu = '<form method="POST"><fieldset><legend>Rechercher Numéro de Sécurité Sociale</legend>';

		if (strlen($errors_message) > 0) {
			$contenu.= '<div class="error">'. $errors_message . '</div>';
		}

		if (strlen($nss) > 0) {
			$contenu.= '<div>'. $nss . '</div>';
		}
		
		$contenu.='<p><label> Nom patient : </label><input type="text" id="nom" name="nom_nss" /></p>
		<p><label> Date de naissance : </label><input type="date" id="datenais" name="datenais_nss" /></p>

		<p>
			<button type="submit" name="affnss">Afficher le numéro de sécurité sociale</button>
		</p>
		</fieldset></form>';

		return $contenu;
	}

?>