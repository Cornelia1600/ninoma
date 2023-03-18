<?php
    // on appelle la vue
    require_once("./vues/DirecteurVue.php");
    
    // on appelle le modele
    require_once("./modeles/DirecteurModele.php");
    require_once("./modeles/MotifModele.php");

    function ctlDirecteur(){
       
        if (isset($_POST["ajout_acces"])) { 
            $titre="Création";
            $errors_message ='';
            $contenu = afficherGestionAccess($errors_message, $titre);
            return  $contenu;
            if (isset($_POST["ajouter_acces"])) { 
                if(empty($_POST['prenom'])||  strlen($_POST['prenom']) == 0){
                    $errors_message=$errors_message.='<p> Retapez le prénom</p>';
                }
                if(empty($_POST['nom'])||  strlen($_POST['nom']) == 0){
                    $errors_message=$errors_message.='<p> Retapez le nom</p>';
                }
                if(empty($_POST['login'])||  strlen($_POST['login']) == 0){
                    $errors_message=$errors_message.='<p> Retapez le login</p>';
                }
                if(empty($_POST['MDP'])||  strlen($_POST['MDP']) == 0){
                    $errors_message=$errors_message.='<p> Retapez le MDP</p>';
                }
                if(strlen($errors_message) > 0){
                    $contenu = afficherGestionAccess($errors_message, $titre);    
                }
                else{
                    $resCreation = Createlogin($_POST['prenom'], $_POST['nom'], $_POST["login"], $_POST["MDP"]);
                    if ($resCreation == TRUE) {
                        return reloadPage();
                    }else {
                        return "<h2>Erreur dans creation d'access<h2>";
                    }
                }
                $contenu = afficherGestionAccess($errors_message, $titre);
                return  $contenu;
             }
        }
        elseif(isset($_POST["modif_acces"])) {
            $titre="Modification";
            $errors_message ='';
            $contenu = afficherGestionAccess($errors_message, $titre);
            return  $contenu;
            if(empty($_POST['login'])||  strlen($_POST['login']) == 0){
                $errors_message=$errors_message.='<p> Retapez le login</p>';
            }
            if(empty($_POST['MDP'])||  strlen($_POST['MDP']) == 0){
                $errors_message=$errors_message.='<p> Retapez le MDP</p>';
            }
            if(empty($_POST['newlogin'])||  strlen($_POST['newlogin'])==0 || $_POST['newMDP']||  strlen($_POST['newMDP'])){
                $errors_message=$errors_message.='<p> Retapez le Nouveau Login et ou MDP</p>';
            }
            if(strlen($errors_message) > 0){
                $contenu = afficherGestionAccess($errors_message, $titre);    
            }
            else{
                $resModification = Createlogin($_POST['prenom'], $_POST['nom'], $_POST["login"], $_POST["MDP"]);
                if ($resModification == TRUE) {
                    return reloadPage();
                }else {
                    return "<h2>Erreur dans modification d'access<h2>";
                }
            }
            $contenu = afficherGestionAccess($errors_message, $titre);
            return  $contenu;
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
        else {

            return afficherPageDirecteur();
        }

        $vueDirecteur = afficherPageDirecteur();
        return $vueDirecteur;
    }
    

    
?>