<?php 
    //Connexion à la bdd
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '', 
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e){
            die('Erreur : ' .$e->getMessage());
        }
    if(isset($_SESSION['id_user'],$_SESSION['id_acteur']) AND !empty($_GET['positif']) AND !empty($_GET['negatif'])) {
        $req = $bdd->prepare('INSERT INTO vote(id_user, id_acteur, vote) VALUES(:id_user, :id_acteur, :vote)');
        $req->execute(array(
            'id_user' => $_SESSION['id_user'],
            'id_acteur' => $_SESSION['id_acteur'],
            'vote' => $_GET['?']
        ));


?>