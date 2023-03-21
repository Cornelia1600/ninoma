<?php
    // on appelle la vue
    require_once("./vues/DirecteurVue.php");
    
    // on appelle le modele
    require_once("./modeles/DirecteurModele.php");
    require_once("./modeles/MotifModele.php");
    require_once("./modeles/SpecialiteModele.php");
    require_once("./modeles/PersonnelModele.php");
    require_once("./modeles/medecinModele.php");

    		

	/*
	-> si user clique sur le ajout_acces => fomrulaire (vide) de gestion de login (mode: création)
    -> liste de tous les médecins -> 1 colonne avec un bouton modif_acces => formulaire (prérempli) de gestion de login (mode: modif) 
    <table>
        ...

        <td><btn value="X" name="modif_acces">Modifier médecin n°X</btn></td>

    </table>
    <btn name="ajout_acces">Ajouter medecin</btn>
	*/

    function ctlDirecteur(){
       
        if (isset($_POST["ajout_acces"])) { 
            $errors_message ='';
            $personnel=getAllPersonnel(); 
            $cat=getAllCategories();
            if (isset($_POST['prenom'], $_POST['nom'], $_POST['login'], $_POST['MDP'])) {
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
                    $contenu = afficherAjoutAccess($errors_message, $cat);    
                }
                else{
                    $resCreation = Createlogin($_POST['prenom'], $_POST['nom'], $_POST["login"], $_POST["MDP"],($_POST["Categorie"]));
                    if ($resCreation == TRUE) {
                        return reloadPage();
                    }else {
                        return "<h2>Erreur dans creation d'access<h2>";
                    }
                }
            }    
                $contenu = afficherAjoutAccess("", $cat); 
                return  $contenu;
             }
        elseif(isset($_POST["modif_acces"])) {
            $errors_message ='';
            $personnel=getAllPersonnel();// getById => avec comme id $_POST["modif_acces"]
            $cat=getAllCategories();
            $contenu = afficherAjoutAccess($$errors_message, $cat, $personnel); 
            return  $contenu;
        }      
        elseif(isset($_POST["ajout_motif"])){
            // appel au Vue Modif motif 
            $errors_message ='';
            if(isset($_POST["libelle"], $_POST["prix"])){

                if(empty($_POST['libelle'])||  strlen($_POST['libelle']) == 0){
                $errors_message=$errors_message.='<p> Retapez le libelle</p>';
                }
                if(empty($_POST['prix'])||  is_nan($_POST['prix'])){
                    $errors_message=$errors_message.='<p> Retapez le prix</p>';
                }
                if(strlen($errors_message) > 0){
                    $contenu = afficherAjoutMotif($errors_message);    
                }
                else{
                    $resaddmotif = CreateMotif($_POST['libelle'],$_POST['prix']);
                    if ($resaddmotif == TRUE) {
                        return reloadPage();
                    }else {
                        return "<h2>Erreur dans l'ajout de motif<h2>";
                    }
                }
            }   
            $contenu = afficherAjoutMotif($errors_message);
            return  $contenu;
            
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
            $Medecins=getAllMedecinswithspecialite(); 
            $contenu = afficherSuppressionMedecin($Medecins);
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