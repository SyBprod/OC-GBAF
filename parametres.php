<?php 
//Création d'un démarrage de session
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Paramètres</title>
        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
        <script src="https://kit.fontawesome.com/03f0bb407b.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400&family=Nunito:wght@700;800&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <?php include('header.php'); ?>
        <main>    
            <section class="card-double">
                <h1>Paramètres</h1>
                <?php
//Connexion à la base de données
try{
	$bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
    //Récupération du compte
    $req = $bdd->prepare('SELECT id, nom, prenom, username, pass, question, reponse FROM account WHERE id =?');
    $req->execute(array($_GET['id']));
    $donnees = $req->fetch();
        ?>

                    <form action="#">
                        <p>Pour modifier un ou plusieurs paramètres de votre compte, saisissez les nouvelles valeurs et valider. Vous serez redirigé vers la page connexion.</p>
                            <div class="input-left"> 
                                <label for="nom">Nom</label>
                                <input type="text" placeholder="Nom" id="nom" name="nom" value="<?php echo $donnees['nom']; ?>" autofocus />
                            </div>
                            <div class="input-right"> 
                                <label for="prenom">Prénom</label>
                                <input type="text" placeholder="Prénom" id="prenom" name="prenom" value="<?php echo $donnees['prenom']; ?>" />
                            </div>
                            <div class="input-left"> 
                                <label for="username">Username</label>
                                <input type="text" placeholder="Username" id="username" name="username" value="<?php echo $donnees['username']; ?>" />
                            </div>
                            <div class="input-right"> 
                                <label for="password">Password</label>
                                <input type="password" placeholder="Password" id="pass" name="pass" value="<?php echo $donnees['pass']; ?>" />
                            </div>
                            <div class="input-center"> 
                                <label for="question">Question secrète</label>
                                <select id="question" name="question">
                                    <option value="<?php echo $donnees['question']; ?>">Nom de jeune fille de votre mère</option>
                                    <option value="<?php echo $donnees['question']; ?>">Nom de votre premier animal de compagnie</option>
                                    <option value="<?php echo $donnees['question']; ?>">Nom de votre école primaire</option>
                                    <option value="<?php echo $donnees['question']; ?>">Prénom de votre cousin ou cousine aîné.e</option>
                                </select>
                            </div>
                            <div class="input-center"> 
                                <label for="reponse">Réponse à la question secrète</label>
                                <input type="text" placeholder="Votre réponse" id="reponse" name="reponse" value="<?php echo $donnees['reponse']; ?>" />
                            </div>
    <?php $req->closeCursor(); //IMPORTANT on libère le curser pour la prochaine requète?>
                            <input class="submit-button" type="submit" role="button" value="Valider">
                    </form>
            </section>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>