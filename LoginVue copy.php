<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Cabinet Ninoma Santé</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form id="f" action="index.php" method="post">
	<fieldset> 
	<legend> Connectez-Vous </legend>
	<p> <label for="Login">Login</label>		
		<input type="text" name="login"/>
	</p>
	<p> <label for="MDP">Mot de passe</label>		
		<input type="text" name="MDP"/>
	</p>
	<input type="submit" Value="Se connecter" name="seconnecter" />

	</fieldset>
	</form>


///Dans la Controleur frontal////

<?php
	if (isset($_POST['seconnecter']) && empty($_POST['login'])){
			casevide();
		
			elseif(isset($_POST['seconnecter']) && !empty($_POST['login']) && !empty($_POST['MDP']){
				$saisilogin = $_POST['login'];
				$saisimdp = $_POST['MDP'];
				if validerlogin($saisilogin,$saisimdp) {
					echo ("logged in")
				}
				
			}
		
		
	}



	}
?>

	


////Dans le modele///

***Recherche login et MDP***
<?php

$requetelogin="SELECT count(*) FROM employe WHERE login=" . $saisilogin AND "MDP="$saisimdp ;
					$resultatlogin=$connexion->query($requetelogin); 
					$resultatlogin->setFetchMode(PDO::FETCH_OBJ);

$requeterole="SELECT idcat FROM categorie WHERE login=" . $saisilogin;
					$resultatrole=$connexion->query($requeterole); 
					$resultatrole->setFetchMode(PDO::FETCH_OBJ);
					

							
?>

///Dans la Controleur////

<?php
  function errorlogin() {
	echo "login ou mot de passe incorrecte!";	
  }
	function casevide(){
		echo "le login ou mot de passe vide, veuillez retaper";		
	}
	
  function validerlogin($saisilogin,$saisimdp){
	  
	  return true;
	  else return false;
	  
  }
  
    function validerrole($saisilogin){
		if 
	  

	  
  }
  
?>

</body>
</html>
