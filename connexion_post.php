<?php

	//Connexion à la base de données
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : ' .$e->getMessage());
        }
    //Vérification de la validité des informations
    $erreur = "";
    if (!empty($_POST['username']) AND !empty($_POST['pass']))
	{
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        //var_dump($_POST);
        $req = $bdd->prepare('SELECT id_user, UPPER(nom) AS nomMaj, prenom, pass FROM account WHERE username = :username');
		$req->execute(array(
			'username' => $username));
		$resultat = $req->fetch();
		//var_dump($resultat['pass']);
		 if (($resultat) AND $_POST['pass'] === $resultat['pass'])
		{
			session_start();
            $_SESSION['id_user'] = $resultat['id_user'];
            //$_SESSION['username'] = $username;
            $_SESSION['nom'] = $resultat['nomMaj'];
            $_SESSION['prenom'] = $resultat['prenom'];
            header('Location: accueil.php');//Redirection vers accueil.php 
            exit;
          // echo 'Vous êtes connectés.<br/>';
		}
        else
		{
            session_start();
			header('Location: index.php');
            echo $erreur;  
           
            //var_dump($erreur);
		}
		
		$req->closeCursor();
	} 
?>