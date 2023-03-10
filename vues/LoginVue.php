<?php

function afficherFormulaireConnexion($erreurMdpLogin = false){
    $form = '
	<form id="login_form" action="#" method="post">
        <fieldset> 
            <legend> Connectez-Vous </legend>';

    if ($erreurMdpLogin) {
        $form.="<p>Erreur dans le login ou le mot de passe</p>";
    }

    $form.= '
    <p>
        <label for="login">Login</label>		
        <input type="text" id="login" name="login"/>
    </p>
    <p> 
        <label for="MDP">Mot de passe</label>		
        <input type="text" id="MDP" name="MDP"/>
    </p>
    <input type="submit" value="Se connecter" name="login_submit" />
    </fieldset>
    </form>
    ';
    return $form;
}

///test
?>