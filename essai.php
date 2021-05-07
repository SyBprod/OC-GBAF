<?php
//COnnexion à la base de données
try{
	$bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '');
     // définir le mode d'erreur PDO sur exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
    //Vérification de la validité des informations
    $erreur = NULL;
    $infos = NULL;
    if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['pass']) AND !empty($_POST['question']) AND !empty($_POST['response'])){
        
            unset($_POST, $nom, $prenom, $username, $pass, $question, $reponse);
    }else{
        $erreur = "Erreur";
    
        $infos = 'Remplir les champs obligatoires.';
    }


     //Insertion
     $req = $bdd->prepare('INSERT INTO account(nom, prenom, username, pass, question, reponse VALUES(:nom, :prenom, :username, :pass, :question, :reponse)');
     $req->execute(array(
         'nom' => $_POST['nom'],
         'prenom' => $_POST['prenom'],
         'username' => $_POST['username'],
         'pass' => $_POST['pass'],
         'question' => $_POST['question'],
         'reponse' => $_POST['reponse']));
 $req->closeCursor(); 
 ?>
