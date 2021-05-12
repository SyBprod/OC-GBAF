<?php
    //Vérification de la validité des informations
    $info = NULL;
    if (!empty($_POST['username']) AND !empty($_POST['pass'])){
            
        $username = $_POST['username'];
        $pass = $_POST['pass']; 
        //unset($_POST, $username, $pass_hashe); dois-je le mettre ou pas?
    }else{
        $info = "Champs obligatoires.";
    }
        
//Connexion à la base de données
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : ' .$e->getMessage());
        }
        //Hashage du mot de passe avant vérification
        //$pass_hashe = password_hash($_POST['pass'], PASSWORD_DEFAULT); 
   //Récupération des données dans la table account et vérification
    $req = $bdd->prepare('SELECT id_user, UPPER(nom) AS nomMaj, prenom, pass FROM account WHERE username = :username');
    $req->execute(array(
        'username' => $username));
    $resultat = $req->fetch();
    
    // Comparaison du pass envoyé via le formulaire avec la base
    //$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
       
    if (!$resultat)
    {
        echo 'Mauvais identifiant ou mot de passe !';//Ne fonctionne pas
    }else{
            session_start();
            $_SESSION['id_user'] = $resultat['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['nom'] = $resultat['nomMaj'];
            $_SESSION['prenom'] = $resultat['prenom'];
    }
    //Redirection vers accueil.php 
    header('Location: accueil.php');
    $req->closeCursor();
?>
					
