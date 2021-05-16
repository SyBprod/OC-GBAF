<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
        <script src="https://kit.fontawesome.com/03f0bb407b.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400&family=Nunito:wght@700;800&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <header>
            <div class="img-solo">
                <img src="images/logo-gbaf.png" alt="logo GBAF" />
            </div>
        </header>
        <main>    
            <!-- Formulaire de connexion du visiteur -->
            <section class="card-simple">
                <h1>Connexion</h1>
		        <form action="connexion_post.php" method="POST">
			        <p>Entrez vos identifiants de connexion</p>
                    <label for="username">Username</label>
                    <input type="text" placeholder="Username" id="username" name="username" value="<?php if(isset($_POST['username'])) echo htmlspecialchars($_POST['username']);  ?>" required autofocus />
                    <label for="password" >Password</label>
                    <input type="password" placeholder="Password" id="password" name="pass" value="<?php if(isset($_POST['pass'])) echo htmlspecialchars($_POST['pass']);  ?>" required />
                    <input class="submit-button" type="submit" role="button">
                    <!-- AFfichage d'un message d'erreur en cas d'identifiants erronés -->
                    <p><?php if(isset($_SESSION['info'])) echo $_SESSION['info']; unset($_SESSION['info']); ?></p>
                    <!-- Lien qui dirige vers une page de récupération du mot de passe en cas de d'oubli -->
                    <a class="pt-20" href="mot-de-passe-oublie.php">Mot de passe oublié ?</a>
		        </form>
            </section>
            <!-- Bouton qui dirige vers la page inscription si le visiteur n'a pas encore de compte -->
            <section class="no-count">
                <div class="mt-20 mb-30">
                    <p class="pb-20">Je n'ai pas de compte</p>
                    <a class="button" href="inscription.php">Inscription</a>
                </div>
            </section>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>