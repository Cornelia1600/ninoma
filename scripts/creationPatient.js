function pays(){
    var departement = document.getElementById("dptnais").value;
    var inputPays = document.getElementById('paysnaiscontainer');
    if (departement == 99) {
        inputPays.style.display="block";
    }else {
        inputPays.style.display="none";
    }
}

function verif() {
    var tlf = document.getElementById('numtel').value;
    var error = document.getElementById("error_tlf")
    if (isNaN(tlf) || tlf.length != 10 ) {
        error.innerHTML = "Numéro de téléphone incorrecte";
    }else {
        error.innerHTML = "";
    }
}