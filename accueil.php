<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil GBAF</title>
        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
        <script src="https://kit.fontawesome.com/03f0bb407b.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400&family=Nunito:wght@700;800&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <?php include('header.php'); ?><!--Inclusion d'un header spécifique avec identification du visiteur-->
        <main>   
            <section class="wrapper">
                <!--Présentation du GBAF-->
                <h1 class="pb-20">GBAF</h1>
		        <p class="pb-20">Représentant de la profession bancaire et des assureurs, le <strong>Groupement Banque Assurance Français</strong> (GBAF) est une fédération représentant de grands groupes français qui vont travailler de la même façon pour gérer près de <strong>80 millions de comptes</strong> sur le territoire national.<br /> Sa mission est de <strong>promouvoir l'activité bancaire à l’échelle nationale</strong>. C’est aussi un <strong>interlocuteur privilégié</strong> des pouvoirs publics. 
                </p>
                <div class="mt-20 mb-20"> 
                    <img class="img-resp" src="images/img-accueil.jpg" alt="illustration GBAF" width="900" height="394" />
                </div>
                <h2 class="pt-20 pb-20">Liste des différents partenaires financiers</h2>
                <p>Les produits et services bancaires sont nombreux et très variés.<br /> Afin de <strong>renseigner au mieux les clients</strong>, les salariés des 340 agences des banques et assurances en France (agents, chargés de clientèle, conseillers financiers, etc.) recherchent <strong>sur Internet des informations portant sur des produits bancaires et des financeurs</strong>, entre autres. <br />
                Aujourd’hui, il n’existe pas de base de données pour chercher ces informations de manière fiable et rapide ou pour donner son avis sur les partenaires et acteurs du secteur bancaire, tels que les associations ou les financeurs solidaires. 
                Pour remédier à cela,  <strong>le GBAF souhaite proposer aux salariés des grands groupes français un point d’entrée unique</strong>, répertoriant un grand nombre d’informations sur les partenaires et acteurs du groupe ainsi que sur les produits et services bancaires et financiers. <br /><strong>Chaque salarié</strong> pourra ainsi poster un commentaire et donner son avis. 
                </p>
                <!--Présentation de chaque partenaire-->
                <div class="liste-part">
                    
                <?php //Connexion à la bdd
                    try{
                        $bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '', 
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                        }
                        catch(Exception $e)
                        {
                            die('Erreur : ' .$e->getMessage());
                        }
                    $req = $bdd->query('SELECT id_acteur, acteur, SUBSTRING(description, 1, 98) AS extrait, logo FROM acteur ');
                    
                    //Récupération des infos de la table acteur
                        while($donnees = $req->fetch())
                            {
                    ?>  
                    <!-- Block de présentation individuelle des partenaires à partir des infos récupérées  -->        
                    <div class="part-content mt-20">
                        <!-- Logo -->
                        <div class="part-img-content">
                            <?php  echo '<img src="data:image/png;base64,' . base64_encode($donnees['logo']) . '" />';?>
                        </div>
                        <!-- Titre et texte -->
						<div class="part-text">
                            <h3><?php echo $donnees['acteur']; ?></h3>
                            <p><?php echo $donnees['extrait']; ?> ...</p> 
                            <!-- Bouton qui ouvre sur la page partenaire correspondant au numéro de l'id récupéré-->
							<a class="button" href="partenaires.php?id_acteur=<?php echo intval($donnees['id_acteur']); ?>" target="_blank">Lire la suite</a>
                        </div>
                    </div>
                    <?php
                            }
                            $req->closeCursor();
                    ?>
                </div>
            </section>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>