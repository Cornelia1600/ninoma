<?php

    // affiche le gabarit du site + le contenu html passé en paramètre
    function gabarit($contenu){
        $html = '
        <!DOCTYPE html>
        <html lang="fr">
        
        <head>
            <title>Cabinet Ninoma Santé</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        </head>
        <body>'.
        $contenu;
        

        if (isset($_SESSION["nom_personnel"])) {
            $html.= ' 
            <form method="post">
                <button type="submit" name="deconnexion">Déconnexion</button>
            </form>
            ';
        }
        
        $html .= '</body></html>';
        echo $html;
    }

    function reloadPage() {
        // On crée un formulaire que l'on soumet en javascript => ça recharge la page + vide le $_POST
        // Utile après un changement dans le $_SESSION (ex: connexion et déconnexion)
        return '
            <form id="form-reload" method="POST"></form>
            <script>
                var form = document.getElementById("form-reload");
                form.submit();
            </script>
        ';
    }    

?>

