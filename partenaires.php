<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php if(isset($_GET['acteur'])) echo $_GET['acteur'];  ?></title><!-- Récupère le titre ACTEUR dans la table ACTEUR-->
        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
        <script src="https://kit.fontawesome.com/03f0bb407b.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400&family=Nunito:wght@700;800&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <?php include('header.php'); ?><!-- Démarrage de session dans le header -->
        <main> 
        <?php 
            //Connexion à la bdd
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '', 
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }
            catch(Exception $e){
                die('Erreur : ' .$e->getMessage());
            }
            if(isset($_GET['id_acteur']))//On teste pour savoir si la variable id_acteur existe en $_GET et on la récupère en $_SESSION pour s'en resservir
            {
                $_SESSION['id_acteur'] = $_GET['id_acteur'];
            }
            //Récupération des infos de la table acteur avec une requète préparée sur la base de l'id_acteur
            $req = $bdd->prepare('SELECT acteur, description, logo FROM acteur WHERE id_acteur = :id_acteur');
            $req->execute(array(
                'id_acteur' => $_SESSION['id_acteur']
            ));
            $resultat = $req->fetch();
            
        ?>  
            <section class="wrapper">
                <div class="mt-20 mb-20"> 
                <!--Récupère le LOGO dans la table ACTEUR-->
                    <?php  echo '<img class="img-resp img-log" alt="Logo partenaire" src="data:image/png;base64,' . base64_encode($resultat['logo']) . '" />';?>
                </div>
                    <!--Récupère le titre ACTEUR dans la table ACTEUR-->
                    <h1 class="pt-20 pb-20"><?php echo $resultat['acteur']; ?></h1>
                    <!--Récupère le texte DESCRIPTION dans la table ACTEUR-->
                    <p class="pt-20"><?php echo $resultat['description']?></p>
        <?php 
            $req->closeCursor();//On ferme la requète pour pouvoir en ouvrir une autre après  
        ?>
                <div class="liste-part">
                    <div class="part-content-social">
                        <div class="social">
                            <div class="nb-comment">
                                <p>
                                    <span>
                                    <?php // Comptage des commentaires
                                        $req = $bdd->prepare('SELECT COUNT(id_post) AS nbPost FROM post WHERE id_acteur = :id_acteur');
                                        $req->execute(array(
                                            'id_acteur' => $_SESSION['id_acteur']
                                        ));
                                        $donnees = $req->fetch();
                                        echo $donnees['nbPost'];
                                    ?>
                                    </span> Commentaire(s)
                                </p>
                            </div>
                            <div class="bt-comment">
                                <a class="button" href="#commenter" alt="commenter"><i class="far fa-comment-alt"></i>Commenter</a>
                            </div>
                            <!--Boutons de prise en compte des votes-->
                            <div class="likes">
                            <?php
                                if(isset($_SESSION['id_user'],$_SESSION['id_acteur']) AND isset($_GET['vote'])) 
                                    {
                                    $req = $bdd->prepare('INSERT IGNORE INTO vote(id_user, id_acteur, vote) VALUES(:id_user, :id_acteur, :vote)');
                                    $req->execute(array(
                                    'id_user' => $_SESSION['id_user'],
                                    'id_acteur' => $_SESSION['id_acteur'],
                                    'vote' => $_GET['vote']
                                    ));
                                    $req->closeCursor();     
                                    }
                            ?>
                            <?php // Comptage des votes positifs
                                $req = $bdd->prepare('SELECT COUNT(vote) AS nbVotesPositifs FROM vote WHERE id_acteur = :id_acteur AND vote = 1');
                                $req->execute(array(
                                    'id_acteur' => $_SESSION['id_acteur'],
                                ));
                                $donnees = $req->fetch();
                                ?>  
                                <span><?php echo $donnees['nbVotesPositifs']; ?></span><a href="partenaires.php?vote=1"><i class="fas fa-thumbs-up"></i></a>
                            <?php
                                $req->closeCursor();    
                            ?>
                             <?php // Comptage des votes négatifs
                                $req = $bdd->prepare('SELECT COUNT(vote) AS nbVotesNegatifs FROM vote WHERE id_acteur = :id_acteur AND vote = 0');
                                $req->execute(array(
                                    'id_acteur' => $_SESSION['id_acteur'],
                                ));
                                $donnees = $req->fetch();
                                ?>  
                                <span><?php echo $donnees['nbVotesNegatifs']; ?></span><a type="button" href="partenaires.php?vote=0"><i class="fas fa-thumbs-down"></i></a>
                            <?php
                                $req->closeCursor();    
                            ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                        //Récupération des commentaires dans la table post pour afficher les posts relatifs à l'id_acteur
                        if(isset($_SESSION['id_acteur']))
                        {
                            $id_acteur = $_SESSION['id_acteur'];
                            $req = $bdd->prepare('SELECT account.id_user, account.prenom AS prenom, post.date_add AS date_add, post.post AS commentaire, post.id_acteur AS ia FROM  post INNER JOIN account ON post.id_user = account.id_user');
                            $req->execute();
                            //Boucle d'affichage des commentaires en fonction
                            while($reponse = $req->fetch())
                            if($id_acteur === $reponse['ia'] )
                            {
                    ?>
                    <div class="part-content">
                        <div class="part-text">
                            <p><strong>De : </strong><?php echo $reponse['prenom']; ?></p>
                            <p><strong>Le : </strong><?php echo $reponse['date_add']; ?></p> 
                            <p><strong>Commentaire : </strong><br /><?php echo nl2br(htmlspecialchars($reponse['commentaire'])); ?></p>
                        </div>
                    </div>
                    <?php            
                            }
                        }
                    // Fin de la boucle d'affichage des commentaires
                        $req->closeCursor();
                    ?>
                    <!--Formulaire pour poster des commentaires -->
                    <form id="commenter" action="post_post.php" method="POST">
                        <label for="prenom">Votre prénom :</label><br />
                        <input type="text" id="prenom" name="prenom" value="<?php if(isset($_SESSION['prenom'])) echo $_SESSION['prenom'];?>">
                        <label for="post">Votre message :</label><br />
                        <textarea id="post" name="post" value="<?php if(isset($_POST['post'])) echo htmlspecialchars($_POST['post']); ?>"> 
                        </textarea>
                        <input class="submit-button" type="submit" value="Envoyer">
                    </form>
                </div>
                <div class="bt-comment">
                    <a class="button" href="accueil.php" alt="commenter"><i class="fas fa-arrow-alt-circle-left"></i>Retour accueil</a>
                </div>
            </section>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>