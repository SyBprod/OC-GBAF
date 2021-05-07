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
            <section class="card-simple">
                 <h1>Connexion</h1>
		            <form action="#">
			            <p>Entrez vos identifiants de connexion</p>
                            <label for="username">Username</label>
                            <input type="text" placeholder="Username" id="username" name="username" value="Username" autofocus />
                            <label for="password">Password</label>
                            <input type="password" placeholder="Password" id="password" name="password" />
                            <input class="submit-button" type="submit" role="button">
                            <a class="pt-20" href="mot-de-passe-oublie.php">Mot de passe oublié ?</a>
		            </form>
            </section>
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