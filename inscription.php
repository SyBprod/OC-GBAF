<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
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
        <main id="connexion">    
            <section class="card-double">
                <h1>Inscription</h1>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <p>Entrez vos informations personnelles</p>
                            <div class="input-left"> 
                                <label for="nom">Nom</label>
                                <input type="text" placeholder="Nom" id="nom" name="nom" value="<?php if(isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']);  ?>" required autofocus />
                            </div>
                            <div class="input-right"> 
                                <label for="prenom">Prénom</label>
                                <input type="text" placeholder="Prénom" id="prenom" name="prenom" value="<?php if(isset($_POST['prenom'])) echo htmlspecialchars($_POST['prenom']);  ?>" required />
                            </div>
                            <div class="input-left"> 
                                <label for="username">Username</label>
                                <input type="text" placeholder="Username" id="username" name="username" value="<?php if(isset($_POST['username'])) echo htmlspecialchars($_POST['username']);  ?>" required />
                            </div>
                            <div  class="input-right"> 
                                <label for="pass">Password</label>
                                <input type="password" placeholder="Password" id="pass" name="pass" value="<?php if(isset($_POST['pass'])) echo htmlspecialchars($_POST['pass']);  ?>" required />
                            </div>
                            <div class="input-center"> 
                                <label for="question">Question secrète</label>
                                <select id="question" name="question">
                                    <option value="Nom de jeune fille de votre mère">Nom de jeune fille de votre mère</option>
                                    <option value="Nom de votre premier animal de compagnie">Nom de votre premier animal de compagnie</option>
                                    <option value="Nom de votre école primaire">Nom de votre école primaire</option>
                                    <option value="Prénom de votre cousin ou cousine aîné.e">Prénom de votre cousin ou cousine aîné.e</option>
                                </select>
                            </div>
                            <div class="input-center"> 
                                <label for="reponse">Réponse à la question secrète</label>
                                <input type="text" placeholder="Votre réponse" id="reponse" name="reponse" value="<?php if(isset($_POST['reponse'])) echo htmlspecialchars($_POST['reponse']);  ?>" />
                            </div>
                            <input class="submit-button" type="submit" role="button" value="Valider">
                    </form>
            </section>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>