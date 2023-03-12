<?php
    // on appelle la vue du formulaire
    require_once("./vues/AgentVue.php");
    require_once("./modeles/SpecialiteModele.php");
    require_once("./modeles/PersonnelModele.php");
    require_once("./modeles/RdvModele.php");
    require_once("./modeles/MotifModele.php");

    // function ctlAgent(){
    //     $contenu = ssCtl1();
    //     $contenu .= ssCtl2();
    //     return $contenu;
    // }


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

    function ctlRdvAgent(){
        var_dump($_POST);
        $specialites = getAllSpecialites(); // récupérer les spécialités depuis le modèle

        if (isset($_POST["prise_rdv"])) {// si on vient d'envoyer le formulaire (après le rechargement de la page)
            if (isset($_POST["specialite"])) {
                // => récup les médecins de cette spécialité
                $medecins = getMedecinBySpecialite($_POST["specialite"]);

                if (isset($_POST['medecin'], $_POST['date_rdv'], $_POST['heure_rdv'])) {
                    $rdvDejaPris = getRdvByDate($_POST['medecin'], $_POST['date_rdv'], $_POST['heure_rdv']);

                    if(isset($rdvDejaPris->IDRDV)) { // si rdv existe (donc qu'il a un id)
                        // on affiche un message + le patient rentre une autre date (on remet le formulaire de prise de rdv)
                        $vueFormRdv = afficherFormPriseRdv($specialites, $medecins, true);// 2e bis : message rdv déjà pris + étape 2 
                    }else {

                        $motifs = getAllMotifs();
                        if(isset($_POST["motif"])){ //TODO

                            
                            // étape 4 : afficher le récap avec les pièces à fournir et les consignes

                            /* A mettre dans des modèles à créer pour chacun des éléments ci-dessous : 
                            specialite : base de donnée avec l'id du $_POST["specialite"] => getSpecialiteById dans le modèle des spécialités
                            medecin :  base de donnée avec l'id du $_POST["medecin"] => getPersonnelById dans le modèle du personnel
                            heure: $_POST["heure_rdv"] 
                            date du rdv : $_POST["date_rdv"]
                            motif: base de donnée avec l'id du $_POST["motif"] => getMotifById dans le modèle des motifs
                            les consignes : base de donnée (table comprend) avec l'IDMO du $_POST["motif"] => getConsignesByMotif depuis le modèle de consignes
                            les pièces jointes : base de donnée (table demande) avec l'IDMO du $_POST["motif"] getPiecesByMotif depuis le modèle de pièces
                            
                            
                            consignes du motif avec l'id $_POST["motif"]
                            'SELECT consigne.IDCO, consigne.LIBELLECO FROM comprend INNER JOIN consigne ON comprend.IDCO = consigne.IDCO WHERE comprend.IDMO ='. $_POST["motif"];
                            
                           
                            */ 
                            // A faire dans le controleur ici : 
                            // $specialite = getSpecialiteById($_POST["specialite"]);
                            // $vueFormRdv = afficherRecapRdv($specialite, $medecin, ...);

                            // étape 5 : enregistre du rdv
                            // requête INSERT vers la table rdv de la bdd
                            
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