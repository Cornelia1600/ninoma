<?php

require_once("./vues/MedecinVue.php");

require_once("./modeles/TacheModele.php");


function ctlMedecin() {
    $messages = "";
    if (isset($_POST["add_tache_admin"])) {
        $nbcreneau = intval($_POST["nbcreneau"]);
        for ($i=1; $i <= $nbcreneau; $i++) { 
            // récuperer le libelle et la date/heure
            $libelleCreneau = $_POST["libelle_creneau_" . $i];
            $dateCreneau = $_POST["date_creneau_" . $i];
            $heureCreneau = $_POST["heure_creneau_" . $i];
            $idMedecin = $_SESSION["id_personnel"];

            // Vérifier si une tache n'existe pas déjà à ce créneau là pour ce médecin
            $creneauDejaPris = getTache($idMedecin, $dateCreneau, $heureCreneau);

            $date =  date_format(new DateTime($dateCreneau), "d/m/Y");

            if (isset($creneauDejaPris->IDTA)) {
                // si oui on affiche un message d'erreur
                $messages .= "<p>Créneau déjà pris le " . $date . " à " . $heureCreneau . "h.</p>";
            }else {
                // sinon on créé la tâche
                creerTache($libelleCreneau, $heureCreneau, $dateCreneau, $idMedecin);
                $messages .= "<p> Tâche ". $libelleCreneau . " administrative du " . $date . " à " . $heureCreneau . "h enregistrée</p>";
            }
                
        }

    }

    return afficherFormMedecin($messages);
}

?>