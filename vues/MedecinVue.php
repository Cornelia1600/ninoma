<?php

// function pour afficher le formulaire
// => au début 1 champ number => onBlur on affiche X champs dans le formulaire (JS)
// chaque champ permet la saisie d'une tâche
//form
            //input[type=number] ( onBlur=> appelle la fonction js )
            /* div (contenir les subforms)
            div*X (X étant le nombre du 1er input) => dans le js
            input[type=date] (pour la date) --> voir rdv
            input[type=number] (pour l'heure) --> voir rdv
            input[type=text] (pour le libelle)
            */
            //  button[type=submit]
  
    
    function afficherFormMedecin($medecin){
        $form = '
        <form id="medecin_form" method="post">
            <fieldset> 
            <legend> Saisissez le nombre de créneau </legend>
        <p>
            <label for="creneau"> Créneau</label>		
            <input type="text" id="creneau" name="creneau"  onBlur="verif()"/>
        </p>
        <button type="submit" value="continuer" name="continuer" />
        </fieldset>
        </form>
        
        ';
        
        return $form;
    
    }         
    

?>