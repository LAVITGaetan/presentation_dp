<?php
session_start();
// Connexion à la base de données
$bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$reponse = $bdd->query('SELECT * FROM membre');

// Si les champs sont remplis et que l'utilisateur clique sur le bouton
if (
    isset($_POST['publier'])
    & !empty($_POST['titre'])
    & !empty($_POST['description'])
) {
    //Si les mots de passe sont identiques
    if ($_POST['mot_de_passe'] == $_POST['mot_de_passe_conf']) {

        //Vérification des entrées de l'utilisateur
        $_POST['titre'] = htmlentities($_POST['titre']);
        $_POST['description'] = htmlentities($_POST['description']);

        //Récupération des checkbox
        if(isset($_POST['graphiste'])){
            $graphiste = 1;
        }
        else{
            $graphiste = 0;
        }
        if(isset($_POST['dev_front'])){
            $dev_front = 1;
        }
        else{
            $dev_front = 0;
        }
        if(isset($_POST['dev_mobile'])){
            $dev_mobile = 1;
        }
        else{
            $dev_mobile = 0;
        }
        if(isset($_POST['dev_back'])){
            $dev_back = 1;
        }
        else{
            $dev_back = 0;
        }
        if(isset($_POST['web_designer'])){
            $web_designer = 1;
        }
        else{
            $web_designer = 0;
        }
        if(isset($_POST['social'])){
            $social = 1;
        }
        else{
            $social = 0;
        }
        if(isset($_POST['expert'])){
            $expert = 1;
        }
        else{
            $expert = 0;
        }

        //Récuperer la date actuelle
        $date_publication = date("Y-m-d");

        // Requete d'insertion des données dans la table 'membre'
        $requete = 'INSERT INTO projet VALUES(NULL, "' . $_SESSION['id'] . '", "' . $_SESSION['photo_profil'] . '", "' . $_SESSION['nom'] . '", "' . $_SESSION['prenom'] . '", "' . $_POST['titre'] . '", "' . $_POST['description'] . '", "' . $graphiste . '"
        , "' . $dev_front . '", "' . $dev_mobile . '", "' . $dev_back . '", "' . $web_designer . '", "' . $social . '", "' . $expert . '", "' . $date_publication . '")';
        $resultat = $bdd->query($requete);
        header('location:liste_projet.php');
    }

    }
