<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen">
    <script src="https://kit.fontawesome.com/03f0bb407b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400&family=Nunito:wght@700;800&display=swap" rel="stylesheet"> 

</head>
<body>
        <header>
            <div class="img-solo">
                <img src="images/logo-gbaf.png" alt="logo GBAF"  />
            </div>
        </header>
        <main>    
            <div class="card-double">
                 <h1>Mot de passe oublié</h1>
		            <form action="#">
			            <p>Pour récupérer votre mot de passe <br/>veuillez répondre à la question secrète</p>
                        <div class="input-center">
                        <label for="username">Username</label>
                            <input type="text" placeholder="Username" id="username" name="username" value="Username" autofocus /> 
                                <label for="q-s">Question secrète</label>
                                <select id="q-s" name="q-s">
                                    <option value="1">Nom de jeune fille de votre mère</option>
                                    <option value="2">Nom de votre premier animal de compagnie</option>
                                    <option value="3">Nom de votre école primaire</option>
                                    <option value="4">Prénom de votre cousin ou cousine aîné.e</option>
                                </select>
                            </div>
                            <div class="input-center"> 
                                <label for="r-q-s">Réponse à la question secrète</label>
                                <input type="text" placeholder="Votre réponse" id="r-q-s" name="r-q-s" value="" />
                            </div>
                            <input class="submit-button" type="submit" role="button" value="Valider">
                            <p class="pt-20 pb-20">J'ai définitivement oublié le mot de passe<span class="no-wrap"> <i class="fas fa-caret-right"></i><a class="pt-20" href="#">  Contacter le webmaster</a></span></p>
		            </form>
            </div>
            
                <div class="no-password">
                    <p id="echo-erreur" class="pb-20">La réponse est éronnée, veuillez recommencer</p><br /><!-- echo $erreur;  -->
                    <p class="pb-20">Votre mot de passe est :</p>
                    <p id="echo-info" class="pb-20">Nestor</p><!--  echo $info;  -->
                    <a class="button" href="index.php">Retour page connexion</a>
                </div>
           
     </main>
    <?php include('footer.php'); ?>
</body>
</html>