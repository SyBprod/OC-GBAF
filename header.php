<header>
        <div class="img-plus">
            <img src="images/logo-gbaf.png" alt="logo gbaf" />
        </div>
        <nav>
            <div class="nav-p">
                <p><?php $_SESSION['Nom']; ?></p>
                <p><?php $_SESSION['Prénom']; ?></p>
            </div>
            <div class="nav-ic"> 
                <a href="index.php" title="Se déconnecter" alt="déconnexion" ><i class="fas fa-sign-out-alt"></i></a>
                <a href="parametres.php" title="Paramètres" alt="Paramètres du commpte" ><i class="fas fa-cog"></i></a>
            </div>
        </nav>
</header>