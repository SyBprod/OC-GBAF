<?php
//Insère les données saisies avec $_POST dans la table ACCOUNT puis redirige vers index.php(page de connexion)
//Connexion à la base de données
try{
	$bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '');
	
	}
	catch(Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
//Vérification de la validité des informations
	$info = NULL;
	
	if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['pass']) AND !empty($_POST['question']) AND !empty($_POST['response'])){
		$nom = htmlspecialchars(addslashes($nom));
		$prenom = htmlspecialchars(addslashes($prenom));
		$username = htmlspecialchars(addslashes($username));
		$pass = htmlspecialchars(addslashes($pass));
		$question = $question;
		$reponse = htmlspecialchars(addslashes($reponse));
		unset($_POST, $nom, $prenom, $username, $pass, $question, $reponse);
	}else{
		$info = "Tous les champs sont obligatoires.";
	}

	//Hachage du mot de passe
	
    //$pass_hashe = password_hash($_POST['pass'], PASSWORD_DEFAULT); 

	 //Insertion dans la table account
	 $req = $bdd->prepare('INSERT INTO account(nom, prenom, username, pass, question, reponse) VALUES(:nom, :prenom, :username, :pass, :question, :reponse)');
     $req->execute(array(
         'nom' => $_POST['nom'],
         'prenom' => $_POST['prenom'],
         'username' => $_POST['username'],
         'pass' => $_POST['pass'],
         'question' => $_POST['question'],
         'reponse' => $_POST['reponse']));
	
//Puis redirection vers index.php pour la connexion
header('Location: index.php');
 ?>