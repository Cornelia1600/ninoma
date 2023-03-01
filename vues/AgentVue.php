<?php

function afficherFormPriseRdv($specialites, $medecins = []){
    $contenu = '<form method="POST"><fieldset><legend>Prise de rendez-vous</legend>
        <div>
            <label for="specialite">Choisir une spécialité : </label>
            <select name="specialite" id="specialite">
                <option value="" selected disabled hidden>-</option>
            ';
             
            for ($i=0; $i < count($specialites) ; $i++) {
                
                $contenu.='<option value="' . $specialites[$i]->IDSP .'"';
                if(isset($_POST["specialite"]) && $_POST["specialite"] == $specialites[$i]->IDSP) {
                    $contenu.=' selected="selected"';
                }
                $contenu.='>'. $specialites[$i]->LIBELLESP .'</option>';
            }
        
    $contenu.= '</select></div>';

    if (count($medecins) > 0) {
        $contenu.='<div>
        <label for="medecin">Choisir un médecin : </label>
        <select name="medecin" id="medecin">
            <option value="" selected disabled hidden>-</option>
        ';
         
        for ($i=0; $i < count($medecins) ; $i++) { 
            $contenu.='<option value="' . $medecins[$i]->IDPERS .'">'. $medecins[$i]->PRENOM . ' ' . $medecins[$i]->NOM .'</option>';
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



    $contenu.='
            <button type="submit" name="prise_rdv">Continuer</button>
    </fieldset></form>';

    return $contenu;
}

?>