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
    //Vérification de la validité des informations de connexion
    
    if (!empty($_POST['username']) AND !empty($_POST['pass']))
	{
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $info = "Erreur dans les identifiants";
        
        $req = $bdd->prepare('SELECT id_user, UPPER(nom) AS nomMaj, prenom, pass FROM account WHERE username = :username');
		$req->execute(array(
			'username' => $username));
		$resultat = $req->fetch();
		
		if ((!$resultat) OR $_POST['pass'] !== $resultat['pass'])//On teste si les résultats concordent
		{
            session_start(); //Si mauvais identifiants ouverture d'une session avec insertion d'un message d'erreur sur la page index.php
            $_SESSION['info'] = $info;
            header('Location: index.php');
        }
            else
		        {
                    session_start(); // Si les identifiants correspondent à ceux de la bdd on charge les variables que l'on va afficher dans le header
                    $_SESSION['id_user'] = $resultat['id_user'];
                    $_SESSION['nom'] = $resultat['nomMaj'];
                    $_SESSION['prenom'] = $resultat['prenom'];
                    header('Location: accueil.php');//Redirection vers accueil.php 
                    exit;
		        }
		$req->closeCursor();
	} 