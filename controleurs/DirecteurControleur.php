<?php
    // on appelle la vue
    require_once("./vues/DirecteurVue.php");
    
    // on appelle le modele
    require_once("./modeles/DirecteurModele.php");

    function ctlDirecteur(){

        if (isset($_POST["modif_acces"])) {

         }
        elseif(isset($_POST["modif_rdv"])){

        }
        elseif(isset($_POST["modif_medecin"])){

        }
        else {

            return afficherPageDirecteur();
        }

        $vueDirecteur = afficherPageDirecteur();
        return $vueDirecteur;
    }
    
?>