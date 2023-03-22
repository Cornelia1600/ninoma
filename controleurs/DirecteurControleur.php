<?php
    // on appelle la vue
    require_once("./vues/DirecteurVue.php");
    
    // on appelle le modele
    require_once("./modeles/DirecteurModele.php");
    require_once("./modeles/MotifModele.php");
    require_once("./modeles/SpecialiteModele.php");
    require_once("./modeles/PersonnelModele.php");
    require_once("./modeles/ConsigneModele.php");
    require_once("./modeles/PieceModele.php");
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
            $personnel=getAllPersonnel();
            $titre = "Ajout";
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
                    $contenu = afficherformulaireAccess($errors_message, $cat, $personnel, $titre);    
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
                   
                $contenu = afficherformulaireAccess($errors_message, $cat, $personnel, $titre); 
                return  $contenu;
             }
        elseif(isset($_POST["form_modif_acces"])){
            $errors_message ='';
            $cat=getAllCategories();
            $personnel=getPersonnelByid($_POST['form_modif_acces']); 
            if (isset($_POST['prenom'], $_POST['nom'], $_POST['login'], $_POST['MDP'])) {// Enregistrer le formulaire de modif
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
                    $contenu = afficherformulaireAccess($errors_message, $cat, $personnel);    
                }
                else{
                    $resCreation = UpdateAccess($_POST["form_modif_acces"], $_POST['prenom'], $_POST['nom'], $_POST["login"], $_POST["MDP"],$_POST["Categorie"]);
                    if ($resCreation == TRUE) {
                        return reloadPage();
                    }else {
                        return "<h2>Erreur dans creation d'access<h2>";
                    }
                }
            } else { 
                if(isset($personnel->login)){
                    $contenu = afficherformulaireAccess($errors_message, $cat, $personnel);// Afficher le formulaire prérempli
                }
            }
  
                
            $contenu = afficherformulaireAccess($errors_message, $cat, $personnel);
            return  $contenu;

            
        }
        elseif(isset($_POST["tableau_modif_acces"])) {
            $personnel=getAllPersonnel();// getById => avec comme id $_POST["modif_acces"]
            $cat=getAllCategories();
            $contenu = afficherModificationAccess($personnel); 
            return  $contenu;
        }      
        elseif(isset($_POST["ajout_motif"])){
            // appel au Vue Modif motif 
            $pieces = getAllPieces();
            $consignes = getAllConsignes();
            $errors_message ='';
            if(isset($_POST["libelle"], $_POST["prix"])){
                if(empty($_POST['libelle'])||  strlen($_POST['libelle']) == 0){
                $errors_message=$errors_message.='<p> Retapez le libelle</p>';
                }
                if(empty($_POST['prix'])||  is_nan($_POST['prix'])){
                    $errors_message=$errors_message.='<p> Retapez le prix</p>';
                }
                if(strlen($errors_message) > 0){
                    $contenu = afficherAjoutMotif($errors_message, $consignes, $pieces);    
                }
                else{
                    $resaddmotif = CreateMotif($_POST['libelle'],$_POST['prix']);
                    if ($resaddmotif[0] == TRUE) {
                        $idmotif = $resaddmotif[1];
                        if (isset($_POST["consignes"]) && count($_POST["consignes"]) > 0) {
                            foreach ($_POST["consignes"] as $idconsigne) {
                                ajoutConsigne($idmotif,$idconsigne);
                                // ajout dans la table comprend avec ajoutConsigne avec en parametre l'IDMO => $idmotif et avec l'id consigne = $idconsigne
                            }
                        }
                        // Faire pareil avec les pièces
                        $idmotif = $resaddmotif[1];
                        if (isset($_POST["pieces"]) && count($_POST["pieces"]) > 0) {
                            foreach ($_POST["pieces"] as $idpiece) {
                                ajoutpiece($idmotif,$idpiece);
                                // ajout dans la table comprend avec ajoutConsigne avec en parametre l'IDMO => $idmotif et avec l'id consigne = $idconsigne
                            }
                        }


                        return reloadPage();
                    }else {
                        return "<h2>Erreur dans l'ajout de motif<h2>";
                    }
                }
            }   
            $contenu = afficherAjoutMotif($errors_message, $consignes, $pieces);
            return  $contenu;
            
        }
        elseif(isset($_POST["modif_prix"])){
            
        }
        elseif(isset($_POST["modif_piece"])){
            
        }
        elseif(isset($_POST["supprime_medecin"])){
            $idmeds=$_POST["supprime_medecin"];
            $resdeletemed = DeleteMedecin($idmeds);
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
            $contenu = afficherAjoutMedecin($errors_message, $specialites);
            return  $contenu;
        }
        else {

            return afficherPageDirecteur();
        }
    }
    

    
?>