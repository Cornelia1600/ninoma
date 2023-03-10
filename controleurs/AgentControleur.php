<?php
    // VUES
    require_once("./vues/AgentVue.php");
    require_once("./vues/PatientVue.php");
    require_once("./vues/AgentSyntheseVue.php");
    require_once("./vues/AgentPaiementVue.php");

    // MODELES
    require_once("./modeles/SpecialiteModele.php");
    require_once("./modeles/PersonnelModele.php");
    require_once("./modeles/RdvModele.php");
    require_once("./modeles/MotifModele.php");
    require_once("./modeles/ConsigneModele.php");
    require_once("./modeles/PieceModele.php");


    function ctlAgent(){
        // 
        if (isset($_POST["ajouterPatient"])) {
            $errors_message ='';
        
            if(empty($_POST['date']) ||$_POST['date'] > date("Y-m-d")){
                $errors_message=$errors_message.'<p> Retapez votre date de naissance</p>';
            }
            if(empty($_POST['nom']) ||  strlen($_POST['nom']) == 0){
                $errors_message=$errors_message.'<p> Retapez votre nom</p>';
            }
            if(empty($_POST['prenom']) || strlen($_POST['prenom']) == 0){
                $errors_message=$errors_message.'<p> Retapez votre prénom</p>';
            }
            if(empty($_POST['nmr']) || strlen(strval($_POST['nmr']))!=13) {
                $errors_message=$errors_message.'<p> Retapez votre numéro de sécurité sociale</p>';
            }
            if(empty($_POST['tlf']) || strlen(strval($_POST['tlf']))!=10){
                $errors_message=$errors_message.'<p> Retapez votre numéro de téléphone</p>';
            }
            
            if(strlen($errors_message) > 0){
                $contenu = afficherFormCreationPatient($errors_message);
            }else{
                // Appeler la function creerPatient du modele qui ajoute le patient 
            }
        } else {
            $contenu = afficherFormCreationPatient();
        }

        return $contenu;
    }
    // function ssCtl1(){
    //     $contenu = $mon1erform();
    //     // if(isset($_POST)) ...
    //     return $contenu;
    // }


    // function ssCtl2(){
    //     $contenu = $mon2eform();
    //     // if(isset($_POST)) ...
    //     return $contenu;
    // }

    function ctlAgentRdv(){
        $specialites = getAllSpecialites(); // récupérer les spécialités depuis le modèle

        if (isset($_POST["prise_rdv"])) {// si on vient d'envoyer le formulaire (après le rechargement de la page)
            if (isset($_POST["specialite"])) {
                // => récup les médecins de cette spécialité
                $medecins = getMedecinBySpecialite($_POST["specialite"]);

                if (isset($_POST['medecin'], $_POST['date_rdv'], $_POST['heure_rdv'])) {
                    $rdvDejaPris = getRdvByDate($_POST['medecin'], $_POST['date_rdv'], $_POST['heure_rdv']);
                    // TODO récupérer indisponibilités

                    if(isset($rdvDejaPris->IDRDV)) { // si rdv existe (donc qu'il a un id)
                        // on affiche un message + le patient rentre une autre date (on remet le formulaire de prise de rdv)
                        $vueFormRdv = afficherFormPriseRdv($specialites, $medecins, true);// 2e bis : message rdv déjà pris + étape 2 
                    }else {

                        $motifs = getAllMotifs();
                        if(isset($_POST["motif"])){ //TODO
                            
                            if (isset($_POST["recap_valide"])) {
                                // étape 5 : enregistre du rdv
                                // requête INSERT vers la table rdv de la bdd
                                // TODO remplacer l'id patient
                                $resInsert = insertRdv($_POST["medecin"], 1 , $_POST["motif"], $_POST['date_rdv'], $_POST['heure_rdv']);    
                                if ($resInsert == TRUE) {
                                    return reloadPage();
                                }else {
                                    return "<h2>Erreur dans l'enregistrement du rdv<h2>";
                                }
                            }


                            $specialite = getSpecialiteById($_POST["specialite"]);
                            $medecin = getMedecinById($_POST["medecin"]);
                            $motif = getMotifById($_POST["motif"]);
                            $consignes = getConsignesByMotif($_POST["motif"]);
                            $pieces = getPiecesByMotif($_POST["motif"]);
                            
                            
                            // étape 4 : afficher le récap avec les pièces à fournir et les consignes
                            $vueFormRdv = afficherRecapRdv($specialite, $medecin, $_POST["heure_rdv"], $_POST["date_rdv"], $motif, $consignes,$pieces);

                            
                        }else {
                            // étape 3 : sélection du motif 
                            $vueFormRdv = afficherFormPriseRdv($specialites, $medecins, false, $motifs);
                        }


                    }
                }else {
                    $vueFormRdv = afficherFormPriseRdv($specialites, $medecins);// 2e étape : sélectionnez le médecin + date et heure
                }
            }          
        }else {
            $vueFormRdv = afficherFormPriseRdv($specialites); // 1ere étape : sélectionnez les spécialités
        }
        
        return $vueFormRdv;
}










?>