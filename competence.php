<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les compétences</title>
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
    <h1 class="marge_menu">Toutes les compétences</h1>
    <div class="liste_competence">
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/graphisteL.png" alt="">
            </div>
            <div class="competence_infos">Un graphiste est un professionnel de la communication qui conçoit des solutions de communication visuelle. Il travaille sur le sens des messages à l'aide des formes graphiques qu'il utilise sur tout type de supports.</div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=graphiste"><input class="competence_bouton" type="submit" value="Rechercher un graphiste"></a></div>
        </div>
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/dev_frontL.png" alt="">
            </div>
            <div class="competence_infos">Ce développeur web va travailler sur la conception du site internet à partir d'une maquette graphique, élaborer par le graphiste-designer. Il a pour mission de créer des sites dynamiques via des langages de programmations</div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=developpeur-front"><input class="competence_bouton" type="submit" value="Rechercher un développeur front-end"></a></div>
        </div>
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/dev_mobileL.png" alt="">
            </div>
            <div class="competence_infos">Le développeur d'applications mobiles est chargé de la réalisation technique d'une application, basée sur un cahier des charges précis. Il calcule et conçoit aussi des programmes informatiques pour le traitement des données.</div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=developpeur-mobile"><input class="competence_bouton" type="submit" value="Rechercher un développeur mobile"></a></div>
        </div>
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/dev_backL.png" alt="">
            </div>
            <div class="competence_infos">Le développeur back-end est un développeur de l'ombre. Il s'occupe de la face cachée des sites et applications web, de la mise en place du site web ou de l'application, de la configuration et la maintenance de la base de données.</div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=developpeur-back"><input class="competence_bouton" type="submit" value="Rechercher un développeur back-end"></a></div>
        </div>
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/web_designerL.png" alt="">
            </div>
            <div class="competence_infos">Le web designer conçoit le design graphique d'un site internet, c'est-à-dire sa charte graphique. Il allie savoir-faire technique et compétences créatives. il est capable de faire une traduction artistique globale d'une idée</div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=web-designer"><input class="competence_bouton" type="submit" value="Rechercher un web-designer"></a></div>
        </div>
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/socialL.png" alt="">
            </div>
            <div class="competence_infos">Le social media manager veille à l'e-réputation d'une marque, d'une entreprise sur Internet et sur les réseaux sociaux. La mission du Social Media Manager. Le Social Media Manager se distingue de celui de Community Manager</div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=social-media-manager"><input class="competence_bouton" type="submit" value="Rechercher un social-media-manager"></a></div>
        </div>
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/cyberL.png" alt="">
            </div>
            <div class="competence_infos">L'expert en sécurité informatique assure la protection des données du système informatique d'une société. Il en étudie sa fiabilité, et met tout en oeuvre pour trouver les failles et lutter contre le piratage. </div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=expert-cyber-securite"><input class="competence_bouton" type="submit" value="Rechercher un expert en cyber sécurité"></a></div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>