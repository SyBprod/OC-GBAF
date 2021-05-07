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
                    <form action="#">
                        <p>Pour modifier un ou plusieurs paramètres de votre compte, saisissez les nouvelles valeurs et valider. Vous serez redirigé vers la page connexion.</p>
                            <div class="input-left"> 
                                <label for="nom">Nom</label>
                                <input type="text" placeholder="Nom" id="nom" name="nom" value="Nom" autofocus />
                            </div>
                            <div class="input-right"> 
                                <label for="prenom">Prénom</label>
                                <input type="text" placeholder="Prénom" id="prenom" name="prenom" value="Prenom" />
                            </div>
                            <div class="input-left"> 
                                <label for="username">Username</label>
                                <input type="text" placeholder="Username" id="username" name="username" value="Username" />
                            </div>
                            <div class="input-right"> 
                                <label for="password">Password</label>
                                <input type="password" placeholder="Password" id="pass" name="pass" />
                            </div>
                            <div class="input-center"> 
                                <label for="question">Question secrète</label>
                                <select id="question" name="question">
                                    <option value="1">Nom de jeune fille de votre mère</option>
                                    <option value="2">Nom de votre premier animal de compagnie</option>
                                    <option value="3">Nom de votre école primaire</option>
                                    <option value="4">Prénom de votre cousin ou cousine aîné.e</option>
                                </select>
                            </div>
                            <div class="input-center"> 
                                <label for="reponse">Réponse à la question secrète</label>
                                <input type="text" placeholder="Votre réponse" id="reponse" name="reponse" value="" />
                            </div>
                            <input class="submit-button" type="submit" role="button" value="Valider">
                    </form>
            </section>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>