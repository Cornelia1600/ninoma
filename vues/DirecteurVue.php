<?php

function afficherPageDirecteur(){
    $form = '
	<form id="directeur_form" action="#" method="post">
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

function afficherModificationAcces(){
    $contenu = '<h2>Modification Acces</h2>';
                '<div>
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


}

function afficherModificationRDV(){


}


?>