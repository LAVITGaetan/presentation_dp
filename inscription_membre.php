<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyDevTeam inscription</title>
    <!-- CSS -->
    <link rel="stylesheet" media="screen and (min-width: 1241px)" href="desktop.css" />
<link rel="stylesheet" media="screen and (max-width: 1240px)" href="mobile.css" />
</head>

<body>
    <!-- Menu de la page -->
    <?php
    if (isset($_SESSION['id'])) {
        include('logged_menu.php');
    } else {
        include('menu.php');
    }
    ?>

    <!-- Formulaire d'inscription -->
    <form class="formulaire_inscription" method="post">
        <!-- titre du formulaire -->
        <h2 class="formulaire_titre">Inscrivez vous!</h2>
        <!-- Logo du formulaire -->
        <div class="formulaire_logo">
            <img src="image/logo.png" alt="logo du menu">
        </div>

        <!-- Nom-->
        <label class="label" for="nom">Nom<br>
            <input required class="input_formulaire" id="nom" type="text" name="nom" pattern="^(?![_.])(?!.*[_.]{2})[a-zA-Z._]+(?<![_.])$"><br />
        </label>

        <!-- prenom-->
        <label class="label" for="prenom">Prenom<br>
            <input class="input_formulaire" id="prenom" type="text" name="prenom" pattern="^(?=.{3,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z._]+(?<![_.])$"><br />
        </label>

        <!-- Email-->
        <label class="label" for="email">E-mail<br>
            <input class="input_formulaire" id="email" type="email" name="email"><br />
        </label>

        <!-- Mot de passe-->
        <label class="label" for="mot_de_passe">Mot de passe <br><span> (contient au moins 1 majuscule, <br> 1 chiffre et 1 caractère spécial)</span><br>
            <input class="input_formulaire" id="mot_de_passe" type="password" name="mot_de_passe" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"><br />
        </label>

        <!-- Confirmation du mot de passe-->
        <label class="label" for="mot_de_passe_conf">Confirmez votre mot de passe<br>
            <input class="input_formulaire" id="mot_de_passe_conf" type="password" name="mot_de_passe_conf" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"><br />
        </label>

        <!-- Selection de la compétence -->
        <div class="custom-select">
            <select name="competence" id="competence">
                <option selected="true" disabled="disabled">Choisissez votre compétence</option>
                <option value="developpeur-back">Développeur Back-End</option>
                <option value="developpeur-front">Développeur Front-End</option>
                <option value="developpeur-mobile">Développeur Mobile</option>
                <option value="expert-cyber-securite">Expert en Cybersécurité</option>
                <option value="graphiste">Graphiste</option>
                <option value="social-media-manager">Social Media Manager</option>
                <option value="web-designer">Web designer</option>
            </select>
        </div>

        <!-- Bouton d'enregistrement-->
        <input class="competence_bouton" type="submit" value="S'inscrire" name="enregistrer">
        <div id="formulaire_alerte"></div>
    </form>
    <!-- Fin du formulaire d'inscription -->

    <!-- Vérification des entrées de l'utilisateur et insertion des données dans la table si elles sont valides-->
    <?php

    // Connexion à la base de données
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query('SELECT * FROM membre');

    // Si les champs sont remplis et que l'utilisateur clique sur le bouton
    if (
        isset($_POST['enregistrer'])
        & !empty($_POST['nom'])
        & !empty($_POST['prenom'])
        & !empty($_POST['mot_de_passe'])
        & !empty($_POST['mot_de_passe_conf'])
        & !empty($_POST['email'])
        & !empty($_POST['competence'])
    ) {
        //Si les mots de passe sont identiques
        if ($_POST['mot_de_passe'] == $_POST['mot_de_passe_conf']) {

            //Vérification des entrées de l'utilisateur
            $_POST['nom'] = htmlentities($_POST['nom'], ENT_QUOTES);
            $_POST['prenom'] = htmlentities($_POST['prenom'], ENT_QUOTES);
            $_POST['mot_de_passe'] = htmlentities($_POST['mot_de_passe'], ENT_QUOTES);
            $_POST['email'] = htmlentities($_POST['email'], ENT_QUOTES);

            //Cryptage du mot de passe et récupération de la date actuelle
            $mot_de_passe_crypte = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
            $date_inscription = date("Y-m-d");

            // Requete d'insertion des données dans la table 'membre'
            $requete = 'INSERT INTO membre VALUES(NULL, "' . $_POST['nom'] . '", "' . $_POST['prenom'] . '", "' . $_POST['competence'] .'", "' . $_POST['email'] . '", "' . $mot_de_passe_crypte . '", "' . $date_inscription . '", NULL)';
            $resultat = $bdd->query($requete);

            //Redirection vers la page de connexion
            header('location:accueil.php');
            
        }else{
            echo 'Vos identifiants ne correspondent pas!';
        }
    }
    else{
        echo 'Veuillez remplir tout les champs du formulaire';
    }

    include('footer.php');

    ?>
</body>

</html>