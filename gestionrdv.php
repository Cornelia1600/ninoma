<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="gestionRDV">
        <fieldset>
            <legend>Spécialité</legend>
				<form action="site.php?menu=rendezvous" method="POST">	
					<h2>Choisir une spécialité</h2>
					<select name="specialite" required>   
						<?php
							try{    
								require_once('connect.php');
								$connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
								$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$connexion->query('SET NAMES UTF8');
								$requeteSpecialite="SELECT * FROM specialite";
								$resultatSpecialite=$connexion->query($requeteSpecialite); 
								$resultatSpecialite->setFetchMode(PDO::FETCH_OBJ);
							
							while ($specialite = $resultatSpecialite->fetch()){
								echo "<option value='" . $specialite['IDSP'] . "'>" . $specialite['LIBELLESP'] . "</option>";
							}
							}
						catch (PDOException $e)
						{
							$msg ='ERREUR dans'.$e->getFile().'Ligne : '.$e->getLine().'Message :'.$e->getMessage();
							exit($msg);
						}
						?>
					</select> 	
						<input type="submit" value="Rechercher médecin" name="find_specialite" />
				</form>
	

		</fieldset>
	
	
	</form>
</body>
</html>