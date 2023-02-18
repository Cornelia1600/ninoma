<?php

    // affiche le gabarit du site + le contenu html passé en paramètre
    function gabarit($contenu){
        echo '
        <!DOCTYPE html>
        <html lang="fr">
        
        <head>
            <title>Cabinet Ninoma Santé</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>'.
        $contenu
        .'
        
        <form action="#" method="post">
            <button type="submit" name="deconnexion">Déconnexion</button>
        </form>
        
        </body>
        </html>
        ';
    }

?>

