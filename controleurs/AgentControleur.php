<?php
    // on appelle la vue du formulaire
    require_once("./vues/AgentVue.php");
    require_once("./modeles/SpecialiteModele.php");
    require_once("./modeles/PersonnelModele.php");
    require_once("./modeles/RdvModele.php");

    function ctlAgent(){
        var_dump($_POST);
        $specialites = getAllSpecialites();

        if (isset($_POST["prise_rdv"])) {// si on était déjà sur le formulaire
            if (isset($_POST["specialite"])) {
                if (isset($_POST['medecin'], $_POST['date_rdv'], $_POST['heure_rdv'])) {
                    $rdv = getRdvByDate($_POST['medecin'], $_POST['date_rdv'], $_POST['heure_rdv']);
                    //  récup le rdv à cette heure => s'il existe => message d'erreur sinon on insère le rdv en BDD
                    var_dump($rdv);
                }

                // => récup les médecins de cette spécialité
                $medecins = getMedecinBySpecialite($_POST["specialite"]);
                // => récup les motifs

                $vueFormRdv = afficherFormPriseRdv($specialites, $medecins);
            }          
        }else {
            $vueFormRdv = afficherFormPriseRdv($specialites);
        }
        
        return $vueFormRdv;
}










?>