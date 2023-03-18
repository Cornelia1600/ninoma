function verifNbCreneau(){
    var nbCreneau = document.getElementById("nbcreneau").value;
    var contenuCreneaux = "";
    for (var i = 1; i <= nbCreneau; i++) {
        contenuCreneaux += `
        <fieldset>
            <legend>Créneau n°${i}</legend>
            <p>
                <label for="libelle_creneau_${i}">Raison :</label>
                <input type="text" name="libelle_creneau_${i}" id="libelle_creneau_${i}" required>
            </p> 
            <p>
                <label for="date_creneau_${i}">Date du créneau bloquée :</label>
                <input type="date" name="date_creneau_${i}" id="date_creneau_${i}" required>
            </p>
            <p>
                <label for="heure_creneau_${i}">Heure du créneau bloquée :</label>
                <input type="number" name="heure_creneau_${i}" id="heure_creneau_${i}" value="8" min="8" max="18" step="1" required>
            </p>
        </fieldset>
        `;

    }
    contenuCreneaux += '<p><button type="submit" name="add_tache_admin">Continuer</button></p>'

    document.getElementById('creneaux').innerHTML = contenuCreneaux;

}