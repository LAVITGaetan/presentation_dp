<link rel="stylesheet" media="screen and (min-width: 1241px)" href="desktop.css" />
<link rel="stylesheet" media="screen and (max-width: 1240px)" href="mobile.css" />
<div class="menu">
    <div class="menu_logo">
        <a href="accueil.php"><img id="menu_logo" src="image/logo.png" alt="logo du site"></a>
    </div>
    <div class="menu_liens">
        <ul class="liens_liste">
            <li><a href="creer_projet.php">Créer un projet</a></li>
            <li><a href="liste_projet.php">Rejoindre un projet</a></li>
            <li><a href="competence.php">Compétences</a></li>
            <li><a href="mon_projet.php">Mon projet</a></li>
            <li><a href="espace_membre.php">Mon profil</a></li>
            <li>
                <form method="post">
                    <input id="deconnexion" type="submit" name="deconnexion" value="Deconnexion">
                </form>
            </li>
        </ul>
    </div>
</div>
<?php
if (isset($_POST['deconnexion'])) {
    session_destroy();
    header('location:connexion_membre.php');
}
?>