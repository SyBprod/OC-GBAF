<?php 
//Démarrage de session qui va être appliquée sur les pages faisant appel à ce header
    session_start();
?>
<header>
        <div class="img-plus">
            <img src="images/logo-gbaf.png" alt="logo gbaf" />
        </div>
        <nav>
            <div class="nav-p">
                <p><?php $_SESSION['id_user']; echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?></p>
            </div>
            <div class="nav-ic"> 
                <a href="deconnexion.php" title="Se déconnecter" alt="déconnexion" ><i class="fas fa-sign-out-alt"></i></a>
                <a href="parametres.php" title="Paramètres" alt="Paramètres du commpte" ><i class="fas fa-cog"></i></a>
            </div>
        </nav>
</header>