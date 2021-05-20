
<?php //Connexion bdd

    session_start();
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : ' .$e->getMessage());
        }

   
     //if(isset($_SESSION['id_user']) AND isset($_SESSION['id_acteur']) AND !empty($_POST['post'])){}
        $id_user = $_SESSION['id_user'];
        $id_acteur = $_SESSION['id_acteur'];
        $post = $_POST['post'];
        var_dump($_SESSION);

    
    $req = $bdd->prepare('INSERT INTO post(id_user, id_acteur, date_add, post) VALUES (:id_user, :id_acteur, NOW(), :post)');
    $req->execute(array(
        ':id_user' => $id_user,
        ':id_acteur' => $id_acteur,
        ':post' => $post
    ));

    $req->closeCursor();
header('Location: partenaires.php');
?>

                  