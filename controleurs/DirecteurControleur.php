<?php
    // on appelle la vue
    require_once("./vues/DirecteurVue.php");
    
    // on appelle le modele
    require_once("./modeles/DirecteurModele.php");
    require_once("./modeles/MotifModele.php");

    function ctlDirecteur(){
       
        if (isset($_POST["modif_acces"])) {
            // appel au Vue Modif acces 
            $personnels = getAllPersonnel();
            return afficherModificationAcces($personnels);
        }
        elseif(isset($_POST["creation_acces"])){
            // appel au Vue creation acces 
        }   
        elseif(isset($_POST["modif_motif"])){
            // appel au Vue Modif motif 
            $motifs = getAllMotifs();    
            return afficherModificationMotif($motifs);
        }
        elseif(isset($_POST["modif_prix"])){
            // appel au Vue Modif prix motif 
        }
        elseif(isset($_POST["modif_piece"])){
            // appel au Vue Modif piece 
        }
        elseif(isset($_POST["modif_medecin"])){
            // appel au Vue Modif medecin 
        }
        elseif(isset($_POST["ajout_medecin"])){
            // appel au Vue Modif medecin 
        }
        else {

            return afficherPageDirecteur();
        }

        $vueDirecteur = afficherPageDirecteur();
        return $vueDirecteur;
    }
    
?>