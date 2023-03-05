<?php

function afficherPageDirecteur(){
    $form = '
	<form id="directeur_form" action="#" method="post">
        <fieldset> 
            <legend> Modifier ou créer </legend>
    <p>
        <label for="acces">Login ou MDP</label>		
        <input type="submit" Value="Acces" name="modif_acces"/>
    </p>
    <p>
        <label for="acces">Rendez-vous</label>		
        <input type="submit" Value="Les élements de rdv" name="modif_rdv"/>
    </p>
    <p>
        <label for="acces">Medecin</label>		
        <input type="submit" Value="Les médecins" name="modif_medecin"/>
    </p>
  
    </fieldset>
    </form>';

    return $form;
}

function afficherModificationPersonnel(){


}


?>