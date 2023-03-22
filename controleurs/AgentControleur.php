<?php
    // on appelle la vue du formulaire
    require_once("./vues/AgentVue.php");
    require_once("./modeles/SpecialiteModele.php");
    require_once("./modeles/PersonnelModele.php");
    require_once("./modeles/RdvModele.php");
    require_once("./modeles/MotifModele.php");
    require_once("./modeles/ConsigneModele.php");
    require_once("./modeles/PieceModele.php");
    require_once("./modeles/PatientModele.php");
    require_once("./vues/PatientVue.php");

    function ctlAgent(){
        if (isset($_POST["retour_accueil"])) {
            return reloadPage();
        }

        // Quand on va de la synthèse vers l'étape 1 de la prise de rdv
        if (isset($_POST["prendre_rdv"])) {
            return ctlAgentRdv($_POST["prendre_rdv"]);
        }
        
        // Entre les étapes de la prise de rdv
        if (isset($_POST["idpatientrdv"])) {
            $resAgentRdv = ctlAgentRdv($_POST["idpatientrdv"]);
            if ($resAgentRdv == $_POST["idpatientrdv"]) {// Après que le rdv a été créé => on réaffiche le patient
                $patientaafficher=getPatientById($_POST["idpatientrdv"]);
            }else {
                return $resAgentRdv;
            }
        }

        if (isset($_POST["ajouter_solde"])) {
            $ressolde = ajouterSolde($_POST["ajouter_solde"], $_POST["solde_a_ajouter"]);
            if ($ressolde == TRUE) {
                $patientaafficher=getPatientById($_POST["ajouter_solde"]);
            }else  {
                return "<h2>Erreur dans l'ajout de solde du patient<h2>";
            }
        }

        if (isset($_POST["payer_rdv"])) {
            $resPaiement = payerRdv($_POST["payer_rdv"]);
            if ($resPaiement[0] == TRUE) {
                $patientaafficher=getPatientById($resPaiement[1]);
            }else {
                $patientsoldeinsuffisant = getPatientById($resPaiement[1]);
            }
        }

        if (isset($_POST["rechercher_patient"])) {
            // recherche avec nss 
            // requete vers modele patient soit nss (getPatientByNSS) 
            // SI patient existe alors on l'affiche dans le formulaire de modification

            $patient=getPatientByNSS($_POST["nss"]);
            if (isset($patient->IDCL)) {
                // le nss existe déjà => afficher la synthèse à la fin de la page en  passant par la variable $patientaafficher
               $patientaafficher = $patient;
            } else {
                // le nss n'existe pas => afficher un message dans le formulaire
                $errorpatientaafficher = 'Numéro de sécurité sociale inconnu';
            }



        }

        if (isset($_POST["affnss"])) {
            $patient=getNSS($_POST["nom_nss"], $_POST["datenais_nss"]);
            if (isset($patient->NSS)) {
                // afficher le nss
                $affichernss = $patient->NSS;
            }else {
                $erroraffichernss = 'Pas de numéro de sécurité de sociale pour ses informations';
            }
        }

        if (isset($_POST["modifier_patient"])) {
            $errors_message ='';
        
            if(empty($_POST['datenais']) || $_POST['datenais'] > date("Y-m-d")){
                $errors_message=$errors_message.='<p> Retapez votre date de naissance</p>';
            }
            if(empty($_POST['nom']) ||  strlen($_POST['nom']) == 0){
                $errors_message=$errors_message.='<p> Retapez votre nom</p>';
            }
            if(empty($_POST['prenom']) || strlen($_POST['prenom']) == 0){
                $errors_message=$errors_message.='<p> Retapez votre prénom</p>';
            }
            if(empty($_POST['nss']) || strlen(strval($_POST['nss']))!=13) {
                $errors_message=$errors_message.='<p> Retapez votre numéro de sécurité sociale</p>';
            }
            if(empty($_POST['numtel']) || strlen(strval($_POST['numtel']))!=10){
                $errors_message=$errors_message.='<p> Retapez votre numéro de téléphone</p>';
            }
            if(strlen($errors_message) > 0){
                $contenu = afficherFormCreationPatient($errors_message, $patient);
            }else{
                // Appeler la function modifierPatient du modele qui modifie le patient 
                if (isset($_POST["paysnais"]) && strlen($_POST["paysnais"]) > 0){
                    $pays = $_POST["paysnais"];
                } else {
                    $pays = "FRANCE";
                }
                $resModification = modifierPatient($_POST["modifier_patient"], $_POST['nss'], $_POST['nom'], $_POST["adresse"], $_POST["prenom"], $_POST["numtel"], $_POST["dptnais"], $pays, $_POST["datenais"]);
                if ($resModification == TRUE) {
                    $patientaafficher=getPatientByNSS($_POST["nss"]);
                }else {
                    return "<h2>Erreur dans l'enregistrement du patient<h2>";
                }
            }
        }

        if (isset($_POST["ajouter_patient"])) {
            $errors_message ='';
        
            if(empty($_POST['datenais']) || $_POST['datenais'] > date("Y-m-d")){
                $errors_message=$errors_message.='<p> Retapez votre date de naissance</p>';
            }
            if(empty($_POST['nom']) ||  strlen($_POST['nom']) == 0){
                $errors_message=$errors_message.='<p> Retapez votre nom</p>';
            }
            if(empty($_POST['prenom']) || strlen($_POST['prenom']) == 0){
                $errors_message=$errors_message.='<p> Retapez votre prénom</p>';
            }
            if(empty($_POST['nss']) || strlen(strval($_POST['nss']))!=13) {
                $errors_message=$errors_message.='<p> Retapez votre numéro de sécurité sociale</p>';
            }
            if(empty($_POST['numtel']) || strlen(strval($_POST['numtel']))!=10){
                $errors_message=$errors_message.='<p> Retapez votre numéro de téléphone</p>';
            }
            if(strlen($errors_message) > 0){
                $contenu = afficherFormCreationPatient($errors_message);
            }else{
                // Appeler la function creerPatient du modele qui ajoute le patient 
                if (isset($_POST["paysnais"]) && strlen($_POST["paysnais"]) > 0){
                    $pays = $_POST["paysnais"];
                } else {
                    $pays = "FRANCE";
                }
                $resCreation = creerPatient($_POST['nss'], $_POST['nom'], $_POST["adresse"], $_POST["prenom"], $_POST["numtel"], $_POST["dptnais"], $pays, $_POST["datenais"]);
                if ($resCreation == TRUE) {
                    $patientaafficher=getPatientByNSS($_POST["nss"]);
                }else {
                    return "<h2>Erreur dans l'enregistrement du patient<h2>";
                }
            }
        } 
        
        if (isset($patientsoldeinsuffisant)) {
            $rdvs = getRdvsOfClient($patientsoldeinsuffisant->IDCL);
            $msgSolde = '<p>Solde insuffisant</p>';
            $contenu = afficherFormCreationPatient($msgSolde, $patientsoldeinsuffisant, $rdvs);
        } elseif (isset($patientaafficher)) {
            $rdvs = getRdvsOfClient($patientaafficher->IDCL);
            $contenu = afficherFormCreationPatient("", $patientaafficher, $rdvs);
        } else {
            $contenu = afficherFormCreationPatient();
        }

        if(isset($errorpatientaafficher)) {
            $contenu .= afficherFormRecherchePatient($errorpatientaafficher);
        }else {
            $contenu .= afficherFormRecherchePatient();
        }

        if (isset($affichernss)) {
            $contenu .= afficherFormNSS("", $affichernss);
        }else if (isset($erroraffichernss)) {
            $contenu .= afficherFormNSS($erroraffichernss);
        } else {
            $contenu .= afficherFormNSS();
        }
        
        return $contenu;
    }

    function ctlAgentRdv($idpatientrdv){
        $specialites = getAllSpecialites(); // récupérer les spécialités depuis le modèle

        if (isset($_POST["prise_rdv"])) {// si on vient d'envoyer le formulaire (après le rechargement de la page)
            if (isset($_POST["specialite"])) {
                // => récup les médecins de cette spécialité
                $medecins = getMedecinBySpecialite($_POST["specialite"]);

                if (isset($_POST['medecin'], $_POST['date_rdv'], $_POST['heure_rdv'])) {
                    $rdvDejaPris = getRdvByDate($_POST['medecin'], $_POST['date_rdv'], $_POST['heure_rdv']);
                    // tachedéja prise

                    if(isset($rdvDejaPris->IDRDV)) { // si rdv existe (donc qu'il a un id)
                        // on affiche un message + le patient rentre une autre date (on remet le formulaire de prise de rdv)
                        $vueFormRdv = afficherFormPriseRdv($idpatientrdv, $specialites, $medecins, true);// 2e bis : message rdv déjà pris + étape 2 
                    }else {

                        $motifs = getAllMotifs();
                        if(isset($_POST["motif"])){
                            
                            if (isset($_POST["recap_valide"])) {
                                // étape 5 : enregistre du rdv
                                // requête INSERT vers la table rdv de la bdd
                                $resInsert = insertRdv($_POST["medecin"], $_POST["idpatientrdv"] , $_POST["motif"], $_POST['date_rdv'], $_POST['heure_rdv']);    
                                if ($resInsert == TRUE) {
                                    return $_POST["idpatientrdv"];
                                }else {
                                    return "<h2>Erreur dans l'enregistrement du rdv<h2>";
                                }
                            }


                            $specialite = getSpecialiteById($_POST["specialite"]);
                            $medecin = getMedecinById($_POST["medecin"]);
                            $patient = getPatientById($_POST["idpatientrdv"]);
                            $motif = getMotifById($_POST["motif"]);
                            $consignes = getConsignesByMotif($_POST["motif"]);
                            $pieces = getPiecesByMotif($_POST["motif"]);
                            
                            
                            // étape 4 : afficher le récap avec les pièces à fournir et les consignes
                            $vueFormRdv = afficherRecapRdv($specialite, $medecin, $patient, $_POST["heure_rdv"], $_POST["date_rdv"], $motif, $consignes,$pieces);

                            
                        }else {
                            // étape 3 : sélection du motif 
                            $vueFormRdv = afficherFormPriseRdv($idpatientrdv, $specialites, $medecins, false, $motifs);
                        }


                    }
                }else {
                    $vueFormRdv = afficherFormPriseRdv($idpatientrdv, $specialites, $medecins);// 2e étape : sélectionnez le médecin + date et heure
                }
            }          
        }else {
            $vueFormRdv = afficherFormPriseRdv($idpatientrdv, $specialites); // 1ere étape : sélectionnez les spécialités
        }
        
        return $vueFormRdv;
}
       
?>