<?php
     //Démarrage d'une session pour récupérer le $_SESSION['id_user']
     session_start();
     //Mise à jour des données dans la table ACCOUNT en fonction de la saisie du visiteur dans leformulaire de la page paramètres.php  puis redirige vers index.php

     //Connexion à la base de données
     try{
          $bdd = new PDO('mysql:host=localhost;dbname=oc_gbaf;charset=utf8', 'root', '', 
          array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          }
          catch(Exception $e)
          {
               die('Erreur : ' .$e->getMessage());
          }
     //Vérification de la validité des informations
          $info = NULL;
          
          if (isset($_SESSION['id_user'])){
               $nom = $_POST['nom'];
               $prenom = $_POST['prenom'];
               $username = $_POST['username'];
               $pass = $_POST['pass'];
               $question = $_POST['question'];
               $reponse = $_POST['reponse'];
               $id_user = $_SESSION['id_user'];
               
          }else{
               $info = "Une erreur s'est produite.";
          }
          //Mise à jour de la table account
          $req = $bdd->prepare('UPDATE account SET nom = :nom, prenom = :prenom, username = :username, pass = :pass, question = :question, reponse = :reponse WHERE id_user = :id_user');
          $req->execute(array(
               'nom' => $nom,
               'prenom' => $prenom,
               'username' => $username,
               'pass' => $pass,
               'question' => $question,
               'reponse' => $reponse,
               'id_user' => $id_user
               ));
               
          //Redirection vers index.php pour une nouvelle identification
          //Puis redirection vers index.php pour la connexion
          header('Location: index.php?info=Vos paramètres ont bien été modifiés.<br /> Veuillez vous identifier.');
          die; 
      
     $req->closeCursor();