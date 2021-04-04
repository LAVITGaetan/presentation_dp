<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher une compétence</title>
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

    <h1 class="marge_menu">Vous recherchez une compétence?<br> Consultez la liste des membres</h1>
<div class="container_profil">
    <div>
        <form class="trier" method="post">
        <div class="custom-select">
            <select name="competence">
                <option value="0" selected="true" disabled="disabled">Sélectionner une compétence</option>
                <option value="graphiste">Graphiste</option>
                <option value="developpeur-front">Développeur Front-end</option>
                <option value="developpeur-back">Développeur Back-end</option>
                <option value="developpeur-mobile">Développeur mobile</option>
                <option value="web-designer">Web-designer</option>
                <option value="social-media-manager">Social-Media-Manage</option>
                <option value="expert-cyber-securite">Expert en cyber sécurité</option>
                <input class="competence_bouton" type="submit" value="Rechercher" name="trier">
            </select>
        </form>
</div>
    </div>
    <?php
    if(isset($_POST['trier'])){
        $competence = $_POST['competence'];
        header('location:competence_inscrits.php?competence='. $competence .'');
    }
    ?>
    <?php
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query('SELECT * FROM membre WHERE competence="' . $_GET['competence'] . '" ORDER BY id DESC ');
    while($donnees = $reponse->fetch()){
        echo '    <div class="profil">
        <div class="profil_image">
            <img id="profil_image" src="upload/'. $donnees['photo_profil'] . '">
            <h3 class="profil_nom">'. $donnees['nom'] . '</h3><br>
            <h3 class="profil_prenom">' . $donnees['prenom'] . '</h3>
        </div>
        <div class="profil_competence-p">
            <h2>' . $donnees['competence'] . '</h2>
        </div>
        <div class="profil_description">
            <p class="description_texte">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora repellendus exercitationem deleniti nihil culpa reiciendis ipsam eius, delectus accusamus cumque excepturi accusantium laboriosam aperiam dolores fugit laborum expedita libero!</p>
        </div>
        <div class="profil_informations">
            <h6>Addresse mail: ' . $donnees['mail'] .'</h6>
            <h6>Date inscription:' . $donnees['date_inscription'] . '</h6>
        </div>
    </div>';
    }
    ?>
</div>
    <?php include('footer.php'); ?>
</body>

</html>