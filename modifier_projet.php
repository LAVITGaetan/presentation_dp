<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$reponse = $bdd->query('SELECT * FROM projet WHERE id="' . $_GET['id_projet'] . '"');
while ($donnees = $reponse->fetch()) {
    $titre = $donnees['titre'];
    $description = $donnees['description'];
    $graphiste = $donnees['graphiste'];
    $dev_front = $donnees['dev_front'];
    $dev_mobile = $donnees['dev_mobile'];
    $dev_back = $donnees['dev_back'];
    $web_designer = $donnees['web_designer'];
    $social = $donnees['social'];
    $expert = $donnees['expert'];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une idée de projet</title>
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

    <h1 class="marge_menu">Modifier votre projet</h1>

    <form class="formulaire_projet" action="update_projet.php" method="POST">
        <label class="formulaire_titre_projet label" for="titre">Titre du projet<br />
            <input class="formulaire_titre_projet formulaire_entrees" id="titre" type="text" name="titre" value="<?php echo $titre; ?>">
        </label><br>
        <label class="formulaire_titre_projet label" for="description">Description du projet<br />
            <textarea class="formulaire_entrees" id="description" name="description"><?php echo $description; ?></textarea>
        </label>
        <div class="form_check">
            <input class="checkbox" type="checkbox" <?php if($graphiste == 1){echo 'checked';}?> name="graphiste"><label>Graphiste</label><br>
            <input class="checkbox" type="checkbox" <?php if($dev_front == 1){echo 'checked';}?> name="dev_front"><label>Développeur Front-End</label><br>
            <input class="checkbox" type="checkbox" <?php if($dev_mobile == 1){echo 'checked';}?> name="dev_mobile"><label>Développeur Mobile</label><br>
            <input class="checkbox" type="checkbox" <?php if($dev_back == 1){echo 'checked';}?> name="dev_back"><label>Développeur Back-End</label><br>
            <input class="checkbox" type="checkbox" <?php if($web_designer == 1){echo 'checked';}?> name="web_designer"><label>Web Designer</label><br>
            <input class="checkbox" type="checkbox" <?php if($social == 1){echo 'checked';}?> name="social"><label>Social Media Manager</label><br>
            <input class="checkbox" type="checkbox" <?php if($expert == 1){echo 'checked';}?> name="expert"><label>Expert en cyber-sécurité</label><br>
            <input class="checkbox" type="hidden" name="id_projet" value="<?php echo $_GET['id_projet']; ?>">
        </div>
        <input class="formulaire_titre_projet competence_bouton form_submit" type="submit" value="Modifier le projet" name="modifier">

    </form>
    <div class="liste_projet">
        <?php
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=my_dev_team;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT * FROM projet WHERE id="' . $_GET['id_projet'] . '"');
        while ($donnees = $reponse->fetch()) {
            echo '<div class="projet_carte">';
            echo '<div class="projet_chef">';
            echo '<a href="profil.php?id=' . $donnees['id_chef'] . '"><img class="projet_profil_logo" src="upload/' . $donnees['photo_profil'] . '" alt=""></a>';
            echo '<div class="projet_noms">';
            echo '<h3>' . $donnees['nom'] . '</h3>';
            echo '<h3>' . $donnees['prenom'] . '</h3>';
            echo '<a href="modifier_projet.php?id_projet=' . $donnees['id'] . '">Modifier le projet</a>';
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
    <?php
    include('footer.php');
    ?>
</body>

</html>