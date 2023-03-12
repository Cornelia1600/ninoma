<?php

// import des utilitaires
require_once('./utils/gestionErreur.php');
require_once("./vues/gabarit.php");
require_once("./modeles/connect.php");

session_start();
$contenu = '<p>Page vide</p>';

try {

    var_dump($_POST);
    if (isset($_POST["deconnexion"])) {// tue la session == déconnexion
        session_destroy();// TODO recharger la page;
        $contenu = reloadPage();
    } else {
        if (isset($_SESSION["nom_personnel"])) {// Si qlqn est connecté
            $categorie = $_SESSION["categorie_personnel"];
            if ($categorie == "MEDECIN") {
                // on appelle le controleur de medecin
                require_once('./controleurs/MedecinControleur.php');
                $contenu = ctlMedecin();
            }
            if ($categorie == "AGENT_ACCUEIL") {
                // on appelle le controleur des agents
                require_once('./controleurs/AgentControleur.php');
                $contenu = ctlAgentRdv();    
            }
            if($categorie == "DIRECTEUR") {
                // on appelle le controleur des directeurs
                require_once('./controleurs/DirecteurControleur.php');
                $contenu = ctlDirecteur();
            }
        }else {
            // => pas de session donc formulaire de connexion
            require_once('./controleurs/LoginControleur.php');
            $contenu = ctlFormLogin();
        }
    }

}
catch(Exception $e) {
    $msg = $e->getMessage() ; // on récupère son code
    $contenu = afficherErreur($msg); // on appelle le contrôleur qui gère les erreurs.
}


gabarit($contenu);//affiche le rendu de la page