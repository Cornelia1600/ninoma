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

function afficherModificationAcces($personnels){
    $contenu = '<h3>Modification Acces</h3><div><table>';
                
    for ($i=0; $i < count($personnels) ; $i++) { 
        // Pour chaque personnel, on recrée la table avec les buttons
        $button1 = '<form method="post"><input type=submit value="Modifier ce login"></form>';

        $contenu.='<tr><td>'.$personnels[$i]->PRENOM.'</td><td>'.$personnels[$i]->NOM.'</td>'.$button1.'</tr>'; 
        
    }
    
    $contenu.= '</table></div>';  
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

function CreationLogin(){
    $contenu = '<h3>Modification Motif</h3><div>;
    <form method="post" action="" name="Creation-Login">
        <label>Login</label>
        <input type="text" name="Login" pattern="[a-zA-Z0-9]+" required />
        <label>Password</label>
        <input type="password" name="password" required />
    <button type="submit" name="login" value="login">Log In</button>
    </form>';
    return $contenu; 

}


?>