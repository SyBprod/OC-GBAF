<?php 
//Création d'un démarrage de session
   // session_start();
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
        <!--Inclusion d'un header spécifique avec identification du visiteur et démarrage de session-->
        <?php include('header.php'); ?>
        <main>  
            <section class="card-double">
                <h1>Paramètres</h1>
                <?php 
                    //Récupération des informations depuis la table account
                    try{  //Connexion à la base de données
                        $bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '', 
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                        }
                        catch(Exception $e)
                        {
                            die('Erreur : ' .$e->getMessage());
                        }
                        //On teste l'existence de la variable de session id_user
                    if(isset($_SESSION['id_user']))
                    {
                        $id_user = $_SESSION['id_user'];
                        $info = '';
                    
                        //Récupération du compte
                        $req = $bdd->prepare('SELECT nom, prenom, username, pass, question, reponse FROM account WHERE id_user = :id_user');
                        $req->execute(array(
                            'id_user' => $id_user
                        ));
                        $donnees = $req->fetch();
                    }  
                        else
                        {
                            echo 'Une erreur s\'est produite!';
                        }
		        $req->closeCursor();
	            ?>
                <!-- Formulaire de modification des paramètres du compte enregistrés après une connexion validée --> 
                <form action="parametres_post.php" method="POST">
                    <p>Pour modifier un ou plusieurs paramètres de votre compte, saisissez les nouvelles valeurs et valider. Vous serez redirigé vers la page connexion.</p>
                    <div class="input-left"> 
                        <label for="nom">Nom</label>
                        <input type="text" placeholder="Nom" id="nom" name="nom" value="<?php echo htmlspecialchars($donnees['nom']); ?>" autofocus />
                    </div>
                    <div class="input-right"> 
                        <label for="prenom">Prénom</label>
                        <input type="text" placeholder="Prénom" id="prenom" name="prenom" value="<?php echo htmlspecialchars($donnees['prenom']); ?>" />
                    </div>
                    <div class="input-left"> 
                        <label for="username">Username</label>
                        <input type="text" placeholder="Username" id="username" name="username" value="<?php echo htmlspecialchars($donnees['username']); ?>" />
                    </div>
                    <div class="input-right"> 
                        <label for="password">Password</label>
                        <input type="password" placeholder="Password" id="pass" name="pass" value="<?php echo htmlspecialchars($donnees['pass']); ?>" />
                    </div>
                    <div class="input-center"> 
                        <label for="question">Question secrète</label>
                        <select id="question" name="question" >
                            <option value="Nom de jeune fille de votre mère"><?php echo $donnees['question']; ?></option>
                            <option value="Nom de votre premier animal de compagnie"><?php echo $donnees['question']; ?></option>
                            <option value="Nom de votre école primaire"><?php $donnees['question']; ?></option>
                            <option value="Prénom de votre cousin ou cousine aîné.e"><?php echo $donnees['question']; ?></option>
                        </select>
                    </div>
                    <div class="input-center"> 
                        <label for="reponse">Réponse à la question secrète</label>
                        <input type="text" placeholder="Votre réponse" id="reponse" name="reponse" value="<?php echo htmlspecialchars($donnees['reponse']); ?>" />
                    </div>
                    <!-- AFfichage d'un message d'erreur en cas d'erreur -->
                    <p><?php echo $info; ?></p>
                    <!-- La validation ramène à la page de connexion -->
                    <input class="submit-button" type="submit" role="button" value="Valider">
                </form>
                
                
            </section>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>