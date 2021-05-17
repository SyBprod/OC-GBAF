<?php //Connexion à la bdd
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : ' .$e->getMessage());
        }
        if(isset($_GET['id_acteur']))
        {
            $id_acteur = $_GET['id_acteur'];
            echo $id_acteur;
        }
        $req = $bdd->prepare('SELECT acteur, description, logo FROM acteur WHERE id_acteur = :id_acteur');
        $req->execute(array(
            'id_acteur' => $id_acteur));
        $resultat = $req->fetch();
        //Récupération des infos de la table acteur
?>
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
                            <div class="likes">
                           
                                <span>11</span><a href="#"><i class="fas fa-thumbs-up"></i></a>
                                <span>10</span><a href="#"><i class="fas fa-thumbs-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="part-content">
                        <div class="part-text">
                            <p>De : </p>
                            <p>Le : </p> 
                            <p>Commentaire : </p>
                        </div>
                    </div>
                    <form id="commenter" action="#" method="POST">
                        <label for="prenom">Votre prénom :</label><br />
                        <input type="text" id="prenom" name="prenom">
                        <label for="post">Votre message :</label><br />
                        <textarea  id="post" name="post" style="width:100%; height:100px;"> 
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