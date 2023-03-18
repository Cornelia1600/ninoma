<?php
    
    function afficherFormMedecin($messages){
        $form = '
        <form id="medecin_form" method="post">
            <fieldset>'. 
                $messages
                . '<legend> Saisissez le nombre de créneau pour des tâches administratives</legend>
                <p>
                    <label for="nbcreneau">Nombre de créneaux</label>		
                    <input type="number" id="nbcreneau" name="nbcreneau" onBlur="verifNbCreneau()" min="1" step="1" required/>
                </p>
                <p id="creneaux"></p>
            </fieldset>
        </form>
        <script src="./scripts/creationTache.js"></script>
        ';
        
        return $form;
    
    }         
    

?>