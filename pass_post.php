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
    
    if (!empty($_POST['username']) AND isset($_POST['question']) AND !empty($_POST['reponse']))
	{
        $username = $_POST['username'];
        $question = $_POST['question'];
        $reponse = $_POST['reponse'];
        $erreur = "Réponse érronée";
        
        
        $req = $bdd->prepare('SELECT id_user, username, question, pass FROM account WHERE reponse = :reponse');
		$req->execute(array(
			'reponse' => $reponse));
		$resultat = $req->fetch();
		
		if ((!$resultat) OR $_POST['question'] !== $resultat['question']) //OR $_POST['reponse'] !== $resultat['reponse']On teste si les résultats concordent
		{
            session_start(); //Si mauvais identifiants ouverture d'une session avec insertion d'un message d'erreur sur la page index.php
            $_SESSION['erreur'] = $erreur;
            //var_dump($_SESSION);
             header('Location: mot-de-passe-oublie.php');
            //exit;
        }
            else
		        {
                    session_start(); // Si les identifiants correspondent à ceux de la bdd on charge les variables que l'on va afficher dans le header
                    $_SESSION['id_user'] = $resultat['id_user'];
                    $_SESSION['pass'] = $resultat['pass'];
                    //var_dump($_SESSION);
                    header('Location: mot-de-passe-oublie.php');
                    exit;
		        }
		$req->closeCursor();
	} 
?>