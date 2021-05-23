<?php //Connexion bdd

    session_start();//Démarrage de session pour récuper les variables de session
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : ' .$e->getMessage());
        }
        
        $id_user = $_SESSION['id_user'];
        $id_acteur = $_SESSION['id_acteur'];
        $post = $_POST['post'];
        $info = "Vous avez déjà posté un commentaire.";

        //Insetion des commentaire dans la table post avec impératif d'un seul post par utilisateur
        $req = $bdd->prepare('INSERT IGNORE INTO post(id_user, id_acteur, date_add, post) VALUES (:id_user, :id_acteur, NOW(), :post)');
        $req->execute(array(
            ':id_user' => $id_user,
            ':id_acteur' => $id_acteur,
            ':post' => $post
        ));
   
    header('Location: partenaires.php');
 $req->closeCursor();
 ?>

