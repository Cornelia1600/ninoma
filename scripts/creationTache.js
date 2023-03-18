function creneau(){
    var tache = document.getElementById("libelleta").value;
    var inputTache = document.getElementById('libelleta');
    if (libelleta) {
        inputTache.style.display="block";
    }else {
        inputTache.style.display="none";
    }
}