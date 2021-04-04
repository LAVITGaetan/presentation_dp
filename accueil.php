<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyDevTeam</title>
    <link rel="stylesheet" media="screen and (min-width: 1241px)" href="desktop.css" />
    <link rel="stylesheet" media="screen and (max-width: 1240px)" href="mobile.css" />
    <link rel="icon" href="https://zupimages.net/up/21/12/kubl.png">
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
    <h1 class="marge_menu">Ils nous ont rejoint récemment</h1>
    <div class="container_profil">
        <?php
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT * FROM membre ORDER BY id DESC LIMIT 4');
        while ($donnees = $reponse->fetch()) {
            echo '    <div class="profil">
        <div class="profil_image">
            <img class="profil_images" src="upload/' . $donnees['photo_profil'] . '" alt="photo de profil">
            <h3 class="profil_nom">' . $donnees['nom'] . '</h3><br>
            <h3 class="profil_prenom">' . $donnees['prenom'] . '</h3>
        </div>
        <div class="profil_competence-p">
            <h2>' . $donnees['competence'] . '</h2>
        </div>
        <div class="profil_description">
            <p class="description_texte">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora repellendus exercitationem deleniti nihil culpa reiciendis ipsam eius, delectus accusamus cumque excepturi accusantium laboriosam aperiam dolores fugit laborum expedita libero!</p>
        </div>
        <div class="profil_informations">
            <h6>Addresse mail: ' . $donnees['mail'] . '</h6>
            <h6>Date inscription:' . $donnees['date_inscription'] . '</h6>
        </div>
    </div>';
        }
        ?>
    </div>
    <h1>Toutes les compétences</h1>
    <div class="liste_competence">
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/graphisteL.png" alt="logo de competence">
            </div>
            <div class="competence_infos">Un graphiste est un professionnel de la communication qui conçoit des solutions de communication visuelle. Il travaille sur le sens des messages à l'aide des formes graphiques qu'il utilise sur tout type de supports.</div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=graphiste"><input class="competence_bouton" type="submit" value="Rechercher un graphiste"></a></div>
        </div>
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/dev_frontL.png" alt="logo de competence">
            </div>
            <div class="competence_infos">Ce développeur web va travailler sur la conception du site internet à partir d'une maquette graphique, élaborer par le graphiste-designer. Il a pour mission de créer des sites dynamiques via des langages de programmations</div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=developpeur-front"><input class="competence_bouton" type="submit" value="Rechercher un développeur front-end"></a></div>
        </div>
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/dev_mobileL.png" alt="logo de competence">
            </div>
            <div class="competence_infos">Le développeur d'applications mobiles est chargé de la réalisation technique d'une application, basée sur un cahier des charges précis. Il calcule et conçoit aussi des programmes informatiques pour le traitement des données.</div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=developpeur-mobile"><input class="competence_bouton" type="submit" value="Rechercher un développeur mobile"></a></div>
        </div>
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/dev_backL.png" alt="logo de competence">
            </div>
            <div class="competence_infos">Le développeur back-end est un développeur de l'ombre. Il s'occupe de la face cachée des sites et applications web, de la mise en place du site web ou de l'application, de la configuration et la maintenance de la base de données.</div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=developpeur-back"><input class="competence_bouton" type="submit" value="Rechercher un développeur back-end"></a></div>
        </div>
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/web_designerL.png" alt="logo de competence">
            </div>
            <div class="competence_infos">Le web designer conçoit le design graphique d'un site internet, c'est-à-dire sa charte graphique. Il allie savoir-faire technique et compétences créatives. il est capable de faire une traduction artistique globale d'une idée</div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=web-designer"><input class="competence_bouton" type="submit" value="Rechercher un web-designer"></a></div>
        </div>
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/socialL.png" alt="logo de competence">
            </div>
            <div class="competence_infos">Le social media manager veille à l'e-réputation d'une marque, d'une entreprise sur Internet et sur les réseaux sociaux. La mission du Social Media Manager. Le Social Media Manager se distingue de celui de Community Manager</div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=social-media-manager"><input class="competence_bouton" type="submit" value="Rechercher un social-media-manager"></a></div>
        </div>
        <div class="competence_carte">
            <div class="competence_image">
                <img class="competence_logo" src="image/cyberL.png" alt="logo de competence">
            </div>
            <div class="competence_infos">L'expert en sécurité informatique assure la protection des données du système informatique d'une société. Il en étudie sa fiabilité, et met tout en oeuvre pour trouver les failles et lutter contre le piratage. </div>
            <div class="competence_recherche"><a href="competence_inscrits.php?competence=expert-cyber-securite"><input class="competence_bouton" type="submit" value="Rechercher un expert en cyber sécurité"></a></div>
        </div>
    </div>
    <h1>Les dernières idées de projet</h1>
    <div class="liste_projet">
        <?php
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT * FROM projet ORDER BY id DESC LIMIT 4');
        while ($donnees = $reponse->fetch()) {
            echo '<div class="projet_carte">';
            echo '<div class="projet_chef">';
            echo '<a href="profil.php?id=' . $donnees['id_chef'] . '"><img class="projet_profil_logo" src="upload/' . $donnees['photo_profil'] . '" alt=""></a>';
            echo '<div class="projet_noms">';
            echo '<h3>' . $donnees['nom'] . '</h3>';
            echo '<h3>' . $donnees['prenom'] . '</h3>';
            echo '</div>';
            echo '</div>';
            echo '<div class="projet_infos">';
            echo '<h2 class="projet_titre">' . $donnees['titre'] . '</h2>';
            echo '<p class="projet_description">' . $donnees['description'] . '</p>';
            echo '</div>';
            echo '<div class="projet_tip">Compétences recherchées</div>';
            echo '<div class="projet_competence">';
            if ($donnees['graphiste'] == 1) {
                echo '<img class="projet_competence_logo" src="image/graphiste.png" alt="">';
            }
            if ($donnees['dev_front'] == 1) {
                echo '<img class="projet_competence_logo" src="image/dev_front.png" alt="">';
            }
            if ($donnees['dev_mobile'] == 1) {
                echo '<img class="projet_competence_logo" src="image/dev_mobile.png" alt="">';
            }
            if ($donnees['dev_back'] == 1) {
                echo '<img class="projet_competence_logo" src="image/dev_back.png" alt="">';
            }
            if ($donnees['web_designer'] == 1) {
                echo '<img class="projet_competence_logo" src="image/web_designer.png" alt="">';
            }
            if ($donnees['social'] == 1) {
                echo '<img class="projet_competence_logo" src="image/social.png" alt="">';
            }
            if ($donnees['expert'] == 1) {
                echo '<img class="projet_competence_logo" src="image/cyber.png" alt="">';
            }
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Aller en haut de page">^</button>
    <script>//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}</script>
    <?php
    include('connexion.php');
    include('footer.php');
    ?>

</body>

</html>