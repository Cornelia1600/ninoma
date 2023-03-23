<?php

/**
 * Function d'affichage des erreurs
 */
function afficherErreur($erreur){
    return '<p class="error">'. $erreur.'</p>
    <form method="POST">
        <button type="submit">Revenir au forum</button>
    </form>';
}

?>