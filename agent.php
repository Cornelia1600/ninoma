<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Exo14</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 		<link rel="stylesheet" type="text/css" href="ex14.css" /> 
		
 <script type="text/javascript">
	function pays(){
		ch='';
		ch='<p>Pays de naissance <input type="text"/><p/>';
		
		document.getElementById('formu').innerHTML=ch;
	}
	
	function verif(){
	var tlf=document.forms['formu'].elements['numtel'].value;
		if ( Pattern.matches("[a-zA-Z]+", tlf)  ){
		document.write("Numéro de téléphone incorrecte");
		
		
		}
	
	function synthese(){
	
	
	
	}
	
	
	
 </script> 
 
    </head>

<body>
		<form id="formu">
		<fieldset>
			<legend>Patient</legend>
			<p>
				<label for="nom">Nom Patient</label>
				<input type="text" nom="nom" name="nom" />
			</p>
			<p>
				<label for="prenom">Prénom Patient</label>
				<input type="text" nom="prenom" name="prenom" />
			</p>
			
			<p>
				<label for="adresse">Adresse</label>
				<input type="text" nom="adresse" name="adresse" />
			</p>
			
			<p>
				<label for="numtel">Numéro de téléphone</label>
				<input type="text" nom="numtel" name="numtel" onblur=verif(); />
			</p>
			
			
			<p>
				<label for="datenais">Date de naissance</label>
				<input type="date" nom="datenais" name="datenais" />
			</p>
			
			<p>
				<label for="dptnais">Département de naissance</label>
				<input type="text" nom="dptnais" placeholder="99 pour l'étranger" required  onBlur=pays(); />
		
			</p>
			
			<p>
			<input type="button" value="Ajouter patient"  onclick="verification()" />
			</p>
			
		</fieldset>
		</form>
		
		
		
		<?php 
		echo'<form id="f"><fieldset><legend>Synthése patient</legend>
		
		<p><label> Numéro de sécurité sociale : </label><input type="text" name="nmr" /></p>
		<p>ou</p>
		<p><label> Nom patient : </label><input type="text" nom="nom" name="nom" /></p>
		<p><label> Date de naissance : </label><input type="date" nom="datenais" name="datenais" /></p>
		
		<p>
		<input type="button" value="synthèse patient"  />
		</p>
	
		</fieldset></form>';
		
		
		?>
		
		
		<?php 
		echo'<form id="f"><fieldset><legend>Compte interne patient</legend>
		<p>Pour le dépôt : </p>
		<p><label> Numéro de sécurité sociale : </label><input type="text" name="nmr" /></p>
		<p>ou</p>
		<p><label> Montant souhaité : </label><input type="text" nom="nom" name="nom" /></p>
		
		
		<p>
		<input type="button" value="Dépôt"  />
		</p>
	
		</fieldset></form>';
		
		
		?>
		

		
		
		
</body>	