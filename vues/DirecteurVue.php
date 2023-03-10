<?php

function afficherPageDirecteur(){
    $form = '
	<form id="directeur_form" action="#" method="post">
        <fieldset> 
            <legend> Page de Directeur </legend>
    <p>
        <label for="acces">Login ou MDP</label>		
        <input type="submit" Value="Créer Acces" name="creation_acces"/>
        <input type="submit" Value="Modifier Acces" name="modif_acces"/>
    </p>
    <p>
        <label for="acces">Rendez-vous</label>		
        <input type="submit" Value="Les élements de rdv" name="modif_rdv"/>
    </p>
    <p>
        <label for="acces">Medecin</label>		
        <input type="submit" Value="Créer" name="modif_medecin"/>
        <input type="submit" Value="Supprimer" name="modif_medecin"/>
    </p>
  
    </fieldset>
    </form>';

    return $form;
}

function afficherModificationAcces(){
    $form = '

	<form id="directeur_form" action="#" method="post">
        <fieldset> 
        <legend> Création, Suppression ou Modification </legend>
    <p>
        <label for="acces">Login ou MDP</label>		
        <input type="submit" Value="Modifier Acces" name="modif_acces"/>
        <input type="submit" Value="Créer Acces" name="create_acces"/>
    </p>
    <p>
        <label for="acces">Rendez-vous</label>		
        <input type="submit" Value="Motif" name="modif_motif"/>
        <input type="submit" Value="Prix" name="modif_prix"/>
        <input type="submit" Value="Pièce" name="modif_prix"/>
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

function afficherModificationRDV(){


}


?>