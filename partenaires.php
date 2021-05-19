
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $resultat['acteur']; ?></title><!-- Récupère le titre ACTEUR dans la table ACTEUR-->
        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
        <script src="https://kit.fontawesome.com/03f0bb407b.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400&family=Nunito:wght@700;800&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <?php include('header.php'); ?>
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
            if(isset($_GET['id_acteur']))//On teste pour savoir si la variable id_acteur existe
            {
                $_SESSION['id_acteur'] = $_GET['id_acteur'];
                var_dump($_SESSION);
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
        <?php //On ferme la requète pour pouvoir en ouvrir une autre après  
            $req->closeCursor();
        ?>
                <div class="liste-part">
                    <div class="part-content-social">
                        <div class="social">
                            <div class="nb-comment">
                                <p><span>0</span> Commentaire(s)</p>
                            </div>
                            <div class="bt-comment">
                                <a class="button" href="#commenter" alt="commenter"><i class="far fa-comment-alt"></i>Commenter</a>
                            </div>
                            <!--Script de prise en compte des votes-->
                            <?php
                            //if(isset($_GET['positif]') AND )
                               //                             $_GET['positif'] $_GET['negatif']
                            ?>
                            <div class="likes">
                                <span>11</span><a href="partenaires.php?vote=positif"><i class="fas fa-thumbs-up"></i></a>
                                <span>10</span><a href="partenaires.php?vote=negatif"><i class="fas fa-thumbs-down"></i></a>
                            </div>
                        </div>
                    </div>
        <?php //Récupération des infos dans la table post pour afficher les posts relatifs à l'id_acteur
            //$id_acteur = $_GET['id_acteur'];
            if(isset($_SESSION['id_acteur']))
            {
            $req = $bdd->prepare('SELECT id_user, date_add, post FROM post WHERE id_acteur = :id_acteur');//pour le prenom voir si je peux faire appel aux SESSIONS
            $req->execute(array(
                'id_acteur' => $_SESSION['id_acteur']
            ));
            
            while($reponse = $req->fetch())
            {
        ?>
                    <div class="part-content">
                        <div class="part-text">
                            <p><strong>De : </strong><?php echo $reponse['id_user']; ?></p>
                            <p><strong>Le : </strong><?php echo $reponse['date_add']; ?></p> 
                            <p><strong>Commentaire : </strong><br /><?php echo nl2br(htmlspecialchars($reponse['post'])); ?></p>
                        </div>
                    </div>
        <?php   }
            }
       // Fin de la boucle des commentaires
            $req->closeCursor();
        ?>
                    <form id="commenter" action="post_post.php" method="POST"><!--Formulaire pour poster des commentaires INSERT INTO post-->
                        <label for="prenom">Votre prénom :</label><br />
                        <input type="text" id="prenom" name="prenom" value="<?php if(isset($_SESSION['prenom'])) echo $_SESSION['prenom'];?>">
                        <label for="post">Votre message :</label><br />
                        <textarea  id="post" name="post" style="width:100%; height:100px;" value="<?php if(isset($_POST['post'])) echo htmlspecialchars($_POST['post']); ?>"> 
                        </textarea>
                        <input type="submit" value="Envoyer">
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