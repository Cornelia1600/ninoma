<?php
    // on appelle la vue
    require_once("./vues/DirecteurVue.php");
    
    // on appelle le modele
    require_once("./modeles/DirecteurModele.php");
    require_once("./modeles/MotifModele.php");
    require_once("./modeles/SpecialiteModele.php");
    require_once("./modeles/medecinModele.php");

    function ctlDirecteur(){
       
        if (isset($_POST["ajout_acces"])) { 
            $errors_message ='';
<<<<<<< Updated upstream
            $Personnel=getAllPersonnel();
            $cat=getallcat();
            if (isset($_POST["ajouter_acces"])) { 
=======
            if(isset($_POST["prenom"], $_POST["nom"], $_POST["login"])){
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                    $contenu = afficherGestionAccess($errors_message = "", $titre,$Personnel, $cat);    
=======
                    $contenu = afficherAjoutAccess($errors_message);    
>>>>>>> Stashed changes
                }
                else{
                    $resCreation = Createlogin($_POST['prenom'], $_POST['nom'], $_POST["login"], $_POST["MDP"],intval(($_POST["categorie"])));
                    if ($resCreation == TRUE) {
                        return reloadPage();
                    }else {
                        return "<h2>Erreur dans creation d'access<h2>";
                    }
                }
<<<<<<< Updated upstream
                $contenu = afficherGestionAccess($errors_message, $titre,$Personnel, $cat);
=======
            }    
                $contenu = afficherAjoutAccess($errors_message);
>>>>>>> Stashed changes
                return  $contenu;
             }
        elseif(isset($_POST["modif_acces"])) {
<<<<<<< Updated upstream
            $titre="Modification";
            $errors_message ='';
            $Personnel=getAllPersonnel();
            $cat=getallcat();
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
                    $contenu = afficherGestionAccess($errors_message = "", $titre,$Personnel, $cat);    
                }
                else{
                    $resModification = UpdateAccess($_POST['prenom'], $_POST['nom'], $_POST["newlogin"], $_POST["newMDP"]);
                    if ($resModification == TRUE) {
                        return reloadPage();
                    }else {
                        return "<h2>Erreur dans modification d'access<h2>";
                    }
                }
            $contenu = afficherGestionAccess($errors_message = "", $titre,$Personnel, $cat);
            return  $contenu;
=======
                $personnel=getAllPersonnel(); 
                $contenu = afficherModificationAccess($personnel);
                return  $contenu;
>>>>>>> Stashed changes
        }    
        elseif(isset($_POST["changer_access"])) {
            $idpers=$_POST["changer_access"];
            $contenu = afficherModificationAccess($personnel);
            return  $contenu;
        }   
        elseif(isset($_POST["modif_motif"])){
            // appel au Vue Modif motif 
            $motifs = getAllMotifs();    
            
        }
        elseif(isset($_POST["modif_prix"])){
            // appel au Vue Modif prix motif 
        }
        elseif(isset($_POST["modif_piece"])){
            // appel au Vue Modif piece 
        }
        elseif(isset($_POST["supprime_medecin"])){
            $idmeds=$_POST["supprime_medecin"];
            var_dump($idmeds);
            $resdeletemed = DeleteMedecin($idmeds);
            var_dump($resdeletemed);
            var_dump($idmeds);
            if ($resdeletemed == TRUE) {
                return reloadPage();
            }else {
                return "<h2>Erreur dans la suppression de médecin<h2>";
            }
        }
        elseif(isset($_POST["delete_medecin"])){
<<<<<<< Updated upstream
            $titre="Suppression";
            $errors_message ='';
            $specialites = NULL;
            $Medecins=getAllMedecins();
            $contenu = afficherGestionMedecin($errors_message, $titre ,$Medecins, $specialites);
            return  $contenu;
        }
        elseif(isset($_POST["supprime_medecin"])){
            // appel au Vue Modif medecin 
            $titre="Suppression";
            $errors_message ='';
            $specialites = NULL;
            $Medecins=getAllMedecins();

            if(isset($_POST["prenom"], $_POST["nom"])){
                if(empty($_POST['prenom'])||  strlen($_POST['prenom']) == 0){
                    $errors_message=$errors_message.='<p> Retapez le prénom</p>';
                }
                if(empty($_POST['nom'])||  strlen($_POST['nom']) == 0){
                    $errors_message=$errors_message.='<p> Retapez le nom</p>';
                }
                if(strlen($errors_message) > 0){
                    $contenu = afficherGestionMedecin($errors_message, $titre, $Medecins, $specialites);    
                }
                else{
                    $resdeletemed = DeleteMedecin($_POST['prenom'], $_POST['nom']);
                    var_dump($resdeletemed);
                    if ($resdeletemed == TRUE) {
                        return reloadPage();
                    }else {
                        return "<h2>Erreur dans la suppression de médecin<h2>";
                    }
                }
            }    
            $contenu = afficherGestionMedecin($errors_message, $titre ,$Medecins, $specialites);
=======
            $Medecins=getAllMedecinswithspecialite(); 
            $contenu = afficherSuppressionMedecin($Medecins);
>>>>>>> Stashed changes
            return  $contenu;
        }
        elseif(isset($_POST["ajout_medecin"])){
            // appel au Vue Modif medecin 
            $errors_message ='';
            $specialites = getAllSpecialites();
            // TODO récupérer les spécialités

            if(isset($_POST["prenom"], $_POST["nom"], $_POST["specialite"])){
                if(empty($_POST['prenom'])||  strlen($_POST['prenom']) == 0){
                    $errors_message=$errors_message.='<p> Retapez le prénom</p>';
                }
                if(empty($_POST['nom'])||  strlen($_POST['nom']) == 0){
                    $errors_message=$errors_message.='<p> Retapez le nom</p>';
                }
                if(strlen($errors_message) > 0){
                    $contenu = afficherAjoutMedecin($errors_message, $specialites);    
                }
                else{
                    $resaddmed = CreateMedecin($_POST['nom'],$_POST['prenom'], 2);
                    if ($resaddmed == TRUE) {
                        return reloadPage();
                    }else {
                        return "<h2>Erreur dans la suppression de médecin<h2>";
                    }
                }
            }   
            $contenu = afficherAjoutMedecin($errors_message, $specialites);// TODO Passer les spécialités
            return  $contenu;
        }
        else {

            return afficherPageDirecteur();
        }
    }
    

    
?>