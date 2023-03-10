<?php

function afficherFormPriseRdv($specialites, $medecins = [], $rdvDejaPris = false, $motifs = []){
    $contenu = '<form method="POST"><fieldset><legend>Prise de rendez-vous</legend>';
        if ($rdvDejaPris) {
            $contenu.= '<h3 style="color:red;">RDV déjà pris. Choisissez une autre date</h3>';
        }
        $contenu.='<div>
            <label for="specialite">Choisir une spécialité : </label>
            <select name="specialite" id="specialite"> 
                <option value="" selected disabled hidden>-</option>
            ';
            // On affiche une liste déroulante. 
             
            for ($i=0; $i < count($specialites) ; $i++) { 
                // Pour chaque spécialité, on crée une option dans la liste
                $contenu.='<option value="' . $specialites[$i]->IDSP .'"';// la valeur renvoyée = IDSPE
                if(isset($_POST["specialite"]) && $_POST["specialite"] == $specialites[$i]->IDSP) {
                    $contenu.=' selected="selected"'; 
                }
                $contenu.='>'. $specialites[$i]->LIBELLESP .'</option>'; // La valeur à afficher = libellé
            }
        
    $contenu.= '</select></div>';

    if (count($medecins) > 0) {// si on a récupéré des médecins d'une spécialité / count renvoi la taille du tableau
        $contenu.='<div>
        <label for="medecin">Choisir un médecin : </label>
        <select name="medecin" id="medecin">
            <option value="" selected disabled hidden>-</option>
        ';
         
        for ($i=0; $i < count($medecins) ; $i++) {
            $contenu .= '<option value="' . $medecins[$i]->IDPERS .'"'; // la valeur renvoyée = IDSPE 

            if (isset($_POST["medecin"]) && $_POST["medecin"] == $medecins[$i]->IDPERS) {
                $contenu .= ' selected="selected"';
            }
            $contenu .= '>' . $medecins[$i]->PRENOM . ' ' . $medecins[$i]->NOM . '</option>'; 

            /* Explication :
                <option value="452342" selected="selected">Mon option</option>
                
                <option value=" | fixe

                452342 | $medecins[$i]->IDPERS
                
                " | fixe

                selected="selected" | depend de isset($_POST["medecin"]) && $_POST["medecin"] == $medecins[$i]->IDPERS
                 
                > | fixe
                
                Mon | prenom
                
                espace | fixe
                
                option | nom
                
                </option> | fixe

            */
        }
        
    
        $contenu.= '</select>        
        </div>
        <div>
            <label for="date_rdv">Choisir une date : </label>
            <input type="date" id="date_rdv" name="date_rdv"/>
        </div>
        <div>
            <label for="heure_rdv">Choisir une heure : </label>
            <input type="number" id="heure_rdv" name="heure_rdv" min="8" max="18" value="8" step="1"/>
        </div>
        ';



    }

    if(count($motifs) > 0){ // Si il existe un motif, alors afficher (avec le select) //TODO
        $contenu.='<div>
        <label for="motif">Choisir un motif : </label>
        <select name="motif" id="motif">
            <option value="" selected disabled hidden>-</option>
        ';
         
        for ($i=0; $i < count($motifs) ; $i++) {
            $contenu .= '<option value="' . $motifs[$i]->IDMO .'"'; // la valeur renvoyée = IDMO
            if (isset($_POST["motif"]) && $_POST["motif"] == $motifs[$i]->IDMO) {
                $contenu .= ' selected="selected"';
            }
            $contenu .= '>' . $motifs[$i]->LIBELLEMO . ' - ' . $motifs[$i]->PRIXMO . '€</option>'; 
        }

        $contenu.= '</select></div>';

    }

    $contenu.='
            <button type="submit" name="prise_rdv">Continuer</button>
    </fieldset></form>';
    // --> ajouter les valeurs des champs du formulaire dans la supervariable $_POST à la clé du nom du champ 
    // ==> $_POST["name_input"] = "value_input"
    // => + recharge la page

    return $contenu;
}

/* A afficher 
Le nom du patient // TODO après
Le nom du médecin avec sa spécialité
La date et l'heure du rdv
Le motif 
Les consignes
Les pièces à fournir
Le prix

+ un btn "valider le rdv"
*/
function afficherRecapRdv($specialite, $medecin){//TODO concatener le rdv
    $contenu = '<form method="POST">
        <h2>Récap du rdv<h2>
        <div>
            <p>Nom du médecin :'. $medecin->PRENOM . ' ' . $medecin->NOM.' '.$specialite->IDSP.'</p>;
            <p>Date et heure du rendez-vous :'. $date->DATERDV .' ' . $date->IDRDV . ' ' . $date->IDRDV . '</p>;
            <p>Motif(s) du rendez-vous :' . $motif->LIBELLEMO .' '. $motif->IDMO . '</p>;
            <p>Consignes du rendez-vous :
         
                for ($i=0; $i < count($consigne) ; $i++) {
                    $contenu .= '<option value ='". $consigne[$i]->IDCO ."'; 
                    if (isset($_POST["consigne"]) && $_POST["consigne"] == $consigne[$i]->IDCO) {
                        $contenu .= ' selected="selected"';
                    }
                    $contenu .= '>' . $consigne[$i]->LIBELLECO . ' - ' . $consigne[$i]->PRIXMO . '€</option>'; 
                }
                    <ul>
                        <li>' . $consigne->IDCO . '</li>// avec affichage dynamique
                        <li>' . $consigne->LIBELLECO . '</li>
                    </ul>   
            </p>
            
        </div>

    ';


    $contenu.='</form>';
    return $contenu;
}

?>