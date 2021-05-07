<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation & co</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen">
    <script src="https://kit.fontawesome.com/03f0bb407b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400&family=Nunito:wght@700;800&display=swap" rel="stylesheet"> 

</head>
<body>
<?php include('header.php'); ?>
    <main>   
        <div class="wrapper">
            <div class="mt-20 mb-20"> <img class="img-resp img-log" src="images/formation_co.png" alt="Formation & co" /></div>
            <h1 class="pt-20 pb-20">Formation & co</h1>
            <p class="pt-20"><strong>Formation&co</strong> est une association française présente sur tout le territoire.
                Nous proposons à des personnes issues de tout milieu de <strong>devenir entrepreneur</strong> grâce à un crédit et un accompagnement professionnel et personnalisé.</p>
            <ul class="pt-10 pb-10"><strong>Notre proposition :</strong>
                <li class="pt-10">un financement jusqu’à 30 000€ ;</li>
                <li>un suivi personnalisé et gratuit ;</li>
                <li>une lutte acharnée contre les freins sociétaux et les stéréotypes.</li>
            </ul>
            <p>Le <strong>financement est possible</strong>, peu importe le métier : coiffeur, banquier, éleveur de chèvres…. Nous collaborons avec des personnes <strong>talentueuses et motivées</strong>.<br />
                Vous n’avez pas de diplômes ? Ce n’est pas un problème pour nous !<br /> <strong>Nos financements s’adressent à tous.</strong></p>
            <div class="liste-part">
                <div class="part-content-social">
                    <div class="social">
                        <div class="nb-comment"><p><span>0</span> Commentaire(s)</p></div>
                        <div class="bt-comment"><a class="button" href="#" alt="commenter" onclick="openActi(event, 'commenter')"><i class="far fa-comment-alt"></i>Commenter</a></div>
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
                <div id="commenter" style="width: 60%; margin:auto;padding:60px 0;">
                    <form action="#" method="POST">
                    <label for="prenom">Votre prénom :</label><br />
                    <input type="text" id="prenom" name="prenom">
                    <label for="post">Votre message :</label><br />
                    <textarea  id="post" name="post" style="width:100%; height:100px;"> 
                    </textarea>
                    <input type="submit" value="Envoyer">
                    </form>
                </div>
            </div>
        
        </div>
     </main>
    <?php include('footer.php'); ?>
</body>
</html>