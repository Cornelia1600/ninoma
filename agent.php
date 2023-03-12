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
	}

	
	
	
 </script> 
 
    </head>

<body>

<?php 

		
		echo'<form id="formu">
		<fieldset>
			<legend>Patient</legend>
			<p>
				<label for="nom">Nom Patient</label>
				<input type="text" id="nom" name="nom" />
			</p>
			<p>
				<label for="prenom">Prénom Patient</label>
				<input type="text" id="prenom" name="prenom" />
			</p>
			
			<p>
				<label for="adresse">Adresse</label>
				<input type="text" id="adresse" name="adresse" />
			</p>
			
			<p>
				<label for="numtel">Numéro de téléphone</label>
				<input type="text" id="numtel" name="numtel" onblur=verif(); />
			</p>
			
			
			<p>
				<label for="datenais">Date de naissance</label>
				<input type="date" id="datenais" name="datenais" />
			</p>
			
			<p>
				<label for="dptnais">Département de naissance</label>
				<input type="text" id="dptnais" placeholder="99 pour létranger" required  onBlur=pays(); />
		
			</p>
			
			<p>
				<label for="nss">Numéro de sécurité sociale</label>
				<input type="text" id="nss" />
		
			</p>
			
			<p>
			<input type="button" value="Ajouter patient"  onclick="verification()" />
			</p>
			
		</fieldset>
		</form>'; 

	
		try{
		
		if(isset($_POST['Ajouter Patient'])) {
			$errors_message ='';
		
			if(empty($_POST['date']) ||$_POST['date'] > date("Y-m-d")){
				$errors_message=$errors_message.'<p> Retapez votre date de naissance</p>';
			}
			if(empty($_POST['nom']) ||  strlen($_POST['nom']) == 0){
				$errors_message=$errors_message.'<p> Retapez votre nom</p>';
			}
			if(empty($_POST['prenom']) || strlen($_POST['prenom']) == 0){
				$errors_message=$errors_message.'<p> Retapez votre prénom</p>';
			}
			if(empty($_POST['nss']) || strlen(strval($_POST['nss']))!=13) {
				$errors_message=$errors_message.'<p> Retapez votre numéro de sécurité sociale</p>';
			}
			if(empty($_POST['numtel']) || strlen(strval($_POST['numtel']))!=10){
				$errors_message=$errors_message.'<p> Retapez votre numéro de téléphone</p>';
			}
			
			if(strlen($errors_message) > 0){
				echo $errors_message;
			}
		
			
		}		
		
	catch(Exception $e){
		$msg='ERREUR dans '.$e->getFile().'Ligne'.$e->getLine().':'.$e->getMessage();
		exit($msg);
	}
?> 		

		
		
		
</body>	